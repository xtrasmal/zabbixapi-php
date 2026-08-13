<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Clients;

use Http\Discovery\Psr17FactoryDiscovery;
use Http\Discovery\Psr18ClientDiscovery;
use Idiot\Zabbix\Request;
use Psr\Http\Client\ClientInterface;
use Psr\Http\Message\RequestFactoryInterface;
use Psr\Http\Message\StreamFactoryInterface;

/**
 * A minimal JSON-RPC 2.0 client.
 *
 * Encodes one ({@see call()}) or many ({@see batch()}) {@see Request} objects as
 * JSON-RPC envelopes, POSTs them over a PSR-18 transport, then normalizes the decoded
 * reply into {@see JsonRpcResponse} objects with {@see decode()}.
 */
final class JsonRpcClient
{
    private const JSON_RPC_REQUEST_ID = 1;
    private const JSON_RPC_VERSION = '2.0';
    private const CONTENT_TYPE = 'application/json-rpc';
    private const ERROR_INVALID_REQUEST = -32600;
    private const ERROR_INTERNAL = -32603;

    private string $url;
    private ?string $token;
    private ?ClientInterface $client;
    private ?RequestFactoryInterface $requestFactory;
    private ?StreamFactoryInterface $streamFactory;

    /**
     * The PSR-18 client and PSR-17 factories are resolved via discovery on first send,
     * so a client can be constructed (and its configuration validated) without an HTTP
     * transport installed.
     *
     * @param array{
     *     url: string,
     *     token?: string|null,
     *     client?: ClientInterface|null,
     *     requestFactory?: RequestFactoryInterface|null,
     *     streamFactory?: StreamFactoryInterface|null,
     * } $options
     */
    public function __construct(array $options)
    {
        $this->url = $options['url'];
        $this->token = $options['token'] ?? null;
        $this->client = $options['client'] ?? null;
        $this->requestFactory = $options['requestFactory'] ?? null;
        $this->streamFactory = $options['streamFactory'] ?? null;
    }

    public function call(Request $request): JsonRpcResponse
    {
        $decoded = $this->send($this->requestPayload($request, self::JSON_RPC_REQUEST_ID));

        return $this->singleResponse($this->decode($decoded), self::JSON_RPC_REQUEST_ID);
    }

    /**
     * @param list<Request> $requests
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

        $decoded = $this->send($this->batchPayload($requests));

        return $this->orderedResponses($this->decode($decoded), range(
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
     * Encode a JSON-RPC payload, POST it over the PSR-18 transport, and return the
     * decoded reply.
     *
     * @param array<string, mixed>|list<mixed> $payload
     *
     * @return array<string, mixed>|list<mixed>
     */
    private function send(array $payload): array
    {
        $request = $this->requestFactory()
            ->createRequest('POST', $this->url)
            ->withHeader('Content-Type', self::CONTENT_TYPE);

        if (null !== $this->token && '' !== $this->token) {
            $request = $request->withHeader('Authorization', 'Bearer ' . $this->token);
        }

        $body = $this->streamFactory()->createStream(json_encode($payload, JSON_THROW_ON_ERROR));
        $response = $this->client()->sendRequest($request->withBody($body));

        return json_decode((string)$response->getBody(), true, flags: JSON_THROW_ON_ERROR);
    }

    private function client(): ClientInterface
    {
        return $this->client ??= Psr18ClientDiscovery::find();
    }

    private function requestFactory(): RequestFactoryInterface
    {
        return $this->requestFactory ??= Psr17FactoryDiscovery::findRequestFactory();
    }

    private function streamFactory(): StreamFactoryInterface
    {
        return $this->streamFactory ??= Psr17FactoryDiscovery::findStreamFactory();
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
     * @param list<Request> $requests
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
    private function requestPayload(Request $request, int $id): array
    {
        return [
            'jsonrpc' => self::JSON_RPC_VERSION,
            'method' => $request->method(),
            'id' => $id,
            'params' => $request->params(),
        ];
    }

    private static function error(mixed $id, int $code, string $message): JsonRpcResponse
    {
        return JsonRpcResponse::fromError($id, [
            'code' => $code,
            'message' => $message,
        ]);
    }
}
