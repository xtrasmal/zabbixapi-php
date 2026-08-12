<?php

declare(strict_types=1);

namespace IntelliTrend\Zabbix\Clients;

use IntelliTrend\Zabbix\JsonRpc\Request;
use IntelliTrend\Zabbix\JsonRpc\Response;
use IntelliTrend\Zabbix\ZabbixApi;
use IntelliTrend\Zabbix\ZabbixApiException;
use JsonException;
use Psr\Log\LoggerInterface;
use Psr\Log\NullLogger;
use UnexpectedValueException;

/**
 * @phpstan-type JsonRpcScalar array|bool|float|int|string|null
 * @phpstan-type JsonRpcObject array<string, JsonRpcScalar>
 * @phpstan-type JsonRpcEnvelope JsonRpcObject|list<JsonRpcScalar>
 */

/**
 * A minimal JSON-RPC 2.0 client.
 *
 * Queue one or more requests, {@see encode()} them for transport (a single
 * request as a lone object, several as a batch array), then validate the
 * decoded response payload with {@see decode()}.
 */
final class JsonRpcClient
{
    /** @var list<Request> */
    private array $messages = [];

    public function __construct(
        private readonly HttpClient $transport,
        private ?LoggerInterface $logger = null,
    ) {
    }

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
    ): Response {
        try {
            $body = $this
                ->query($method, $id, $params)
                ->encode();

            if ($body === null) {
                throw new UnexpectedValueException('Failed to encode JSON-RPC request.');
            }

            $this->log()->debug('Sending Zabbix JSON-RPC request.', [
                'method' => $method,
                'params' => $params,
                'body' => $body,
            ]);

            $response = $this->transport->postJsonRpc(
                url: $url,
                body: $body,
                bearerToken: $bearerToken
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
                previous: $e
            );
        }
    }

    /**
     * Queue a request expecting a reply.
     */
    public function query(string $method, int|string|null $id, ?array $params = null): self
    {
        $this->messages[] = Request::request($method, $id, $params);

        return $this;
    }

    /**
     * Queue a notification: fire-and-forget, no reply expected.
     */
    public function notify(string $method, ?array $params = null): self
    {
        $this->messages[] = Request::notification($method, $params);

        return $this;
    }

    /**
     * Encode the queued messages and reset the queue.
     *
     * A single message encodes as a lone object, multiple as a batch array.
     * Returns null when nothing is queued.
     * @throws UnexpectedValueException when the request cannot be encoded as JSON.
     */
    public function encode(): ?string
    {
        if ($this->messages === []) {
            return null;
        }

        $payload = count($this->messages) === 1 ? $this->messages[0] : $this->messages;
        $this->messages = [];

        try {
            return json_encode($payload, JSON_THROW_ON_ERROR);
        } catch (JsonException $e) {
            throw new UnexpectedValueException("Failed to encode JSON-RPC request: {$e->getMessage()}", previous: $e);
        }
    }

    /**
     * Decode a JSON-RPC reply into one {@see Response} per result, in the order
     * received.
     *
     * @param JsonRpcEnvelope $payload
     * @return list<Response>
     * @throws UnexpectedValueException on a non-conforming envelope.
     */
    public function decode(array $payload): array
    {
        if ($payload === []) {
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
     * @param JsonRpcObject $envelope
     */
    private function toResponse(array $envelope): Response
    {
        if (($envelope['jsonrpc'] ?? null) !== Request::VERSION) {
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

        $id = $this->normalizeId($envelope['id']);

        if ($hasError) {
            if (!is_array($envelope['error']) || array_is_list($envelope['error'])) {
                throw new UnexpectedValueException('JSON-RPC response errors must be objects.');
            }

            try {
                return Response::fromError($id, $envelope['error']);
            } catch (\InvalidArgumentException $e) {
                throw new UnexpectedValueException($e->getMessage(), previous: $e);
            }
        }

        return Response::fromResult($id, $envelope['result']);
    }

    private function normalizeId(array|bool|float|int|string|null $id): int|string|null
    {
        if (is_int($id) || is_string($id) || $id === null) {
            return $id;
        }

        throw new UnexpectedValueException('JSON-RPC response ids must be strings, integers, or null.');
    }

    /**
     * @param list<Response> $responses
     * @throws UnexpectedValueException
     */
    private function singleResponse(array $responses, int|string|null $requestId): Response
    {
        if (count($responses) !== 1) {
            throw new UnexpectedValueException('Expected exactly one JSON-RPC response.');
        }

        $response = $responses[0];

        if ($response->id !== $requestId) {
            throw new UnexpectedValueException('JSON-RPC response id did not match request id.');
        }

        return $response;
    }

    private function log(): LoggerInterface
    {
        return $this->logger ?? new NullLogger();
    }
}
