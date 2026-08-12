<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Clients;

use Idiot\Zabbix\ZabbixApi;
use Idiot\Zabbix\ZabbixApiException;
use InvalidArgumentException;
use Psr\Log\LoggerInterface;
use Psr\Log\NullLogger;
use UnexpectedValueException;

/**
 * A minimal JSON-RPC 2.0 client.
 *
 * Queue one or more requests as JSON-RPC envelopes, then validate the decoded
 * response payload with {@see decode()}.
 */
final class JsonRpcClient
{
    /** @var list<JsonRpcRequest> */
    private array $messages = [];

    public function __construct(
        private readonly HttpClient $transport,
        private ?LoggerInterface $logger = null,
    ) {}

    public function setLogger(LoggerInterface $logger): self
    {
        $this->logger = $logger;

        return $this;
    }

    /**
     * @throws ZabbixApiException
     */
    public function call(
        string $url,
        string $method,
        int|string|null $id,
        array $params = [],
        ?string $bearerToken = null,
    ): JsonRpcResponse {
        try {
            $payload = $this
                ->query($method, $id, $params)
                ->payload();

            if (null === $payload) {
                throw new UnexpectedValueException('Failed to build JSON-RPC request.');
            }

            $this->log()->debug('Sending Zabbix JSON-RPC request.', [
                'method' => $method,
                'params' => $params,
                'payload' => $payload,
            ]);

            $response = $this->transport->postJsonRpc(
                url: $url,
                payload: $payload,
                bearerToken: $bearerToken,
            );

            $this->log()->debug('Received Zabbix JSON-RPC response.', [
                'method' => $method,
                'response' => $response,
            ]);

            return $this->singleResponse($this->decode($response), $id);
        } catch (UnexpectedValueException $e) {
            throw new ZabbixApiException(
                message: $e->getMessage(),
                code: ZabbixApi::EXCEPTION_CLASS_CODE,
                previous: $e,
            );
        }
    }

    /**
     * @param list<array{method: string, id: int|string|null, params?: array<string, mixed>|list<mixed>}> $calls
     *
     * @throws ZabbixApiException
     *
     * @return list<JsonRpcResponse>
     */
    public function batch(
        string $url,
        array $calls,
        ?string $bearerToken = null,
    ): array {
        if ([] === $calls) {
            throw new ZabbixApiException('Cannot send an empty JSON-RPC batch.', ZabbixApi::EXCEPTION_CLASS_CODE);
        }

        $ids = [];

        try {
            foreach ($calls as $call) {
                $ids[] = $call['id'];
                $this->query($call['method'], $call['id'], $call['params'] ?? []);
            }

            $payload = $this->payload();

            if (null === $payload) {
                throw new UnexpectedValueException('Failed to build JSON-RPC batch request.');
            }

            $this->log()->debug('Sending Zabbix JSON-RPC batch request.', [
                'methods' => array_column($calls, 'method'),
                'payload' => $payload,
            ]);

            $response = $this->transport->postJsonRpc(
                url: $url,
                payload: $payload,
                bearerToken: $bearerToken,
            );

            $this->log()->debug('Received Zabbix JSON-RPC batch response.', [
                'methods' => array_column($calls, 'method'),
                'response' => $response,
            ]);

            return $this->orderedResponses($this->decode($response), $ids);
        } catch (UnexpectedValueException $e) {
            throw new ZabbixApiException(
                message: $e->getMessage(),
                code: ZabbixApi::EXCEPTION_CLASS_CODE,
                previous: $e,
            );
        }
    }

    /**
     * Queue a request expecting a reply.
     */
    public function query(string $method, int|string|null $id, ?array $params = null): self
    {
        $this->messages[] = JsonRpcRequest::request($method, $id, $params);

        return $this;
    }

    /**
     * Queue a notification: fire-and-forget, no reply expected.
     */
    public function notify(string $method, ?array $params = null): self
    {
        $this->messages[] = JsonRpcRequest::notification($method, $params);

        return $this;
    }

    /**
     * Return the queued messages as JSON-RPC payload arrays and reset the queue.
     *
     * A single message returns as a lone object, multiple as a batch array.
     * Returns null when nothing is queued.
     *
     * @return array<string, mixed>|list<array<string, mixed>>|null
     */
    public function payload(): ?array
    {
        if ([] === $this->messages) {
            return null;
        }

        $messages = array_map(
            static fn (JsonRpcRequest $message): array => $message->jsonSerialize(),
            $this->messages,
        );

        $this->messages = [];

        return 1 === count($messages) ? $messages[0] : $messages;
    }

    /**
     * Decode a JSON-RPC reply into one {@see JsonRpcResponse} per result, in the order
     * received.
     *
     * @param array<string, mixed>|list<mixed> $payload
     *
     * @throws UnexpectedValueException on a non-conforming envelope.
     *
     * @return list<JsonRpcResponse>
     */
    public function decode(array $payload): array
    {
        if ([] === $payload) {
            throw new UnexpectedValueException('Empty batch responses are invalid JSON-RPC responses.');
        }

        $isBatch = array_is_list($payload) && isset($payload[0]) && is_array($payload[0]);
        $envelopes = $isBatch ? $payload : [$payload];
        $responses = [];

        foreach ($envelopes as $envelope) {
            if (!is_array($envelope) || array_is_list($envelope)) {
                throw new UnexpectedValueException('Not a JSON-RPC 2.0 response.');
            }

            $responses[] = $this->toResponse($envelope);
        }

        return $responses;
    }

    /**
     * @param array<string, mixed> $envelope
     */
    private function toResponse(array $envelope): JsonRpcResponse
    {
        if (($envelope['jsonrpc'] ?? null) !== JsonRpcRequest::VERSION) {
            throw new UnexpectedValueException('Not a JSON-RPC 2.0 response.');
        }

        if (!array_key_exists('id', $envelope)) {
            throw new UnexpectedValueException('JSON-RPC responses must contain an id.');
        }

        $hasResult = array_key_exists('result', $envelope);
        $hasError = array_key_exists('error', $envelope);

        if ($hasResult === $hasError) {
            throw new UnexpectedValueException('JSON-RPC responses must contain exactly one of result or error.');
        }

        $id = $envelope['id'];

        if (!is_int($id) && !is_string($id) && null !== $id) {
            throw new UnexpectedValueException('JSON-RPC response ids must be strings, integers, or null.');
        }

        if ($hasError) {
            if (!is_array($envelope['error']) || array_is_list($envelope['error'])) {
                throw new UnexpectedValueException('JSON-RPC response errors must be objects.');
            }

            try {
                return JsonRpcResponse::fromError($id, $envelope['error']);
            } catch (InvalidArgumentException $e) {
                throw new UnexpectedValueException($e->getMessage(), previous: $e);
            }
        }

        return JsonRpcResponse::fromResult($id, $envelope['result']);
    }

    /**
     * @param list<JsonRpcResponse> $responses
     *
     * @throws UnexpectedValueException
     */
    private function singleResponse(array $responses, int|string|null $requestId): JsonRpcResponse
    {
        if (1 !== count($responses)) {
            throw new UnexpectedValueException('Expected exactly one JSON-RPC response.');
        }

        $response = $responses[0];

        if ($response->id !== $requestId) {
            throw new UnexpectedValueException('JSON-RPC response id did not match request id.');
        }

        return $response;
    }

    /**
     * @param list<JsonRpcResponse> $responses
     * @param list<int|string|null> $requestIds
     *
     * @return list<JsonRpcResponse>
     */
    private function orderedResponses(array $responses, array $requestIds): array
    {
        if (count($responses) !== count($requestIds)) {
            throw new UnexpectedValueException('JSON-RPC batch response count did not match request count.');
        }

        $byId = [];

        foreach ($responses as $response) {
            $key = $this->responseKey($response->id);

            if (array_key_exists($key, $byId)) {
                throw new UnexpectedValueException('JSON-RPC batch response contained a duplicate id.');
            }

            $byId[$key] = $response;
        }

        $ordered = [];

        foreach ($requestIds as $requestId) {
            $key = $this->responseKey($requestId);

            if (!array_key_exists($key, $byId)) {
                throw new UnexpectedValueException('JSON-RPC batch response id did not match request id.');
            }

            $ordered[] = $byId[$key];
        }

        return $ordered;
    }

    private function responseKey(int|string|null $id): string
    {
        return get_debug_type($id) . ':' . serialize($id);
    }

    private function log(): LoggerInterface
    {
        return $this->logger ?? new NullLogger();
    }
}
