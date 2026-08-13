<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Clients;

use Idiot\Zabbix\Requests\ZabbixRequest;
use Psr\Log\LoggerInterface;
use Psr\Log\NullLogger;

/**
 * A minimal JSON-RPC 2.0 client.
 *
 * Queue one or more requests as JSON-RPC envelopes, then normalize the decoded
 * response payload with {@see decode()}.
 */
final class JsonRpcClient
{
    private const JSON_RPC_REQUEST_ID = 1;
    private const JSON_RPC_VERSION = '2.0';
    private const ERROR_INVALID_REQUEST = -32600;
    private const ERROR_INTERNAL = -32603;

    public function __construct(
        private readonly HttpClient $transport,
        private readonly ?LoggerInterface $logger = null,
    ) {}

    public function call(ZabbixRequest $request): JsonRpcResponse
    {
        $this->log()->debug('Sending Zabbix JSON-RPC request.', [
            'method' => $request->method(),
            'params' => $request->params(),
        ]);

        $response = $this->transport->postJson($this->requestPayload($request, self::JSON_RPC_REQUEST_ID));

        $this->log()->debug('Received Zabbix JSON-RPC response.', [
            'method' => $request->method(),
            'response' => $response,
        ]);

        return $this->singleResponse($this->decode($response), self::JSON_RPC_REQUEST_ID);
    }

    /**
     * @param list<ZabbixRequest> $requests
     *
     * @return list<JsonRpcResponse>
     */
    public function batch(array $requests): array
    {
        if ([] === $requests) {
            return [
                self::error(null, self::ERROR_INVALID_REQUEST, 'Cannot send an empty JSON-RPC batch.'),
            ];
        }

        $this->log()->debug('Sending Zabbix JSON-RPC batch request.', [
            'methods' => array_map(static fn (ZabbixRequest $request): string => $request->method(), $requests),
        ]);

        $response = $this->transport->postJson($this->batchPayload($requests));

        $this->log()->debug('Received Zabbix JSON-RPC batch response.', [
            'methods' => array_map(static fn (ZabbixRequest $request): string => $request->method(), $requests),
            'response' => $response,
        ]);

        return $this->orderedResponses($this->decode($response), range(
            self::JSON_RPC_REQUEST_ID,
            count($requests),
        ));
    }

    /**
     * Decode a JSON-RPC reply into one {@see JsonRpcResponse} per result, in the order
     * received.
     *
     * @param array<string, mixed>|list<mixed> $payload
     *
     * @return list<JsonRpcResponse>
     */
    public function decode(array $payload): array
    {
        if ([] === $payload) {
            return [
                self::error(null, self::ERROR_INVALID_REQUEST, 'Empty batch responses are invalid JSON-RPC responses.'),
            ];
        }

        $isBatch = array_is_list($payload) && isset($payload[0]) && is_array($payload[0]);
        $envelopes = $isBatch ? $payload : [$payload];
        $responses = [];

        foreach ($envelopes as $envelope) {
            if (!is_array($envelope) || array_is_list($envelope)) {
                $responses[] = self::error(null, self::ERROR_INVALID_REQUEST, 'Not a JSON-RPC 2.0 response.');

                continue;
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
        if (!array_key_exists('id', $envelope)) {
            return self::error(null, self::ERROR_INVALID_REQUEST, 'JSON-RPC responses must contain an id.');
        }

        $id = $envelope['id'];
        $hasResult = array_key_exists('result', $envelope);
        $hasError = array_key_exists('error', $envelope);

        if ($hasResult === $hasError) {
            return self::error(
                $id,
                self::ERROR_INVALID_REQUEST,
                'JSON-RPC responses must contain exactly one of result or error.',
            );
        }

        if ($hasError) {
            if (!is_array($envelope['error']) || array_is_list($envelope['error'])) {
                return self::error($id, self::ERROR_INVALID_REQUEST, 'JSON-RPC response errors must be objects.');
            }

            return JsonRpcResponse::fromError($id, $envelope['error']);
        }

        return JsonRpcResponse::fromResult($id, $envelope['result']);
    }

    /**
     * @param list<JsonRpcResponse> $responses
     */
    private function singleResponse(array $responses, int $requestId): JsonRpcResponse
    {
        if (1 !== count($responses)) {
            return self::error(null, self::ERROR_INTERNAL, 'Expected exactly one JSON-RPC response.');
        }

        $response = $responses[0];

        if ($response->id !== $requestId) {
            return self::error($response->id, self::ERROR_INTERNAL, 'JSON-RPC response id did not match request id.');
        }

        return $response;
    }

    /**
     * @param list<JsonRpcResponse> $responses
     * @param list<int>             $requestIds
     *
     * @return list<JsonRpcResponse>
     */
    private function orderedResponses(array $responses, array $requestIds): array
    {
        if (count($responses) !== count($requestIds)) {
            return [
                self::error(null, self::ERROR_INTERNAL, 'JSON-RPC batch response count did not match request count.'),
            ];
        }

        $byId = [];

        foreach ($responses as $response) {
            $key = $this->responseKey($response->id);

            if (array_key_exists($key, $byId)) {
                return [
                    self::error($response->id, self::ERROR_INTERNAL, 'JSON-RPC batch response contained a duplicate id.'),
                ];
            }

            $byId[$key] = $response;
        }

        $ordered = [];

        foreach ($requestIds as $requestId) {
            $key = $this->responseKey($requestId);

            if (!array_key_exists($key, $byId)) {
                return [
                    self::error($requestId, self::ERROR_INTERNAL, 'JSON-RPC batch response id did not match request id.'),
                ];
            }

            $ordered[] = $byId[$key];
        }

        return $ordered;
    }

    private function responseKey(mixed $id): string
    {
        return get_debug_type($id) . ':' . serialize($id);
    }

    /**
     * @param list<ZabbixRequest> $requests
     *
     * @return list<array{jsonrpc: string, method: string, id: int, params: array}>
     */
    private function batchPayload(array $requests): array
    {
        $payload = [];
        $id = self::JSON_RPC_REQUEST_ID;

        foreach ($requests as $request) {
            $payload[] = $this->requestPayload($request, $id++);
        }

        return $payload;
    }

    /**
     * @return array{jsonrpc: string, method: string, id: int, params: array}
     */
    private function requestPayload(ZabbixRequest $request, int $id): array
    {
        return [
            'jsonrpc' => self::JSON_RPC_VERSION,
            'method' => $request->method(),
            'id' => $id,
            'params' => $request->params(),
        ];
    }

    private function log(): LoggerInterface
    {
        return $this->logger ?? new NullLogger();
    }

    private static function error(mixed $id, int $code, string $message): JsonRpcResponse
    {
        return JsonRpcResponse::fromError($id, [
            'code' => $code,
            'message' => $message,
        ]);
    }
}
