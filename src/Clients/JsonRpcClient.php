<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Clients;

use Http\Discovery\Psr17Factory;
use Http\Discovery\Psr17FactoryDiscovery;
use Http\Discovery\Psr18ClientDiscovery;
use Idiot\Zabbix\Options;
use Idiot\Zabbix\Request;
use Psr\Http\Client\ClientInterface;
use Psr\Http\Message\RequestFactoryInterface;
use Psr\Http\Message\StreamFactoryInterface;
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

    private ClientInterface $client;
    private RequestFactoryInterface $requestFactory;
    private StreamFactoryInterface $streamFactory;
    private ?array $options;

    public function __construct(Options $options)
    {
        $this->options = $options->options;
        $this->client = $options->options['client'] ?? Psr18ClientDiscovery::find();
        $this->requestFactory = Psr17FactoryDiscovery::findRequestFactory();
        $this->streamFactory = Psr17FactoryDiscovery::findStreamFactory();
    }

    public function call(Request $payload): JsonRpcResponse
    {
        // 1. Create the base POST request (The URI '' comes from your original code)
        $request = $this->requestFactory->createRequest('POST', $this->options['url']);

        foreach ($this->options['headers'] ?? [] as $name => $value) {
            $request = $request->withHeader($name, $value);
        }

        if (!empty($this->options['token'])) {
            $request = $request->withHeader('Authorization', 'Bearer ' . $this->options['token']);
        }

        // 2. Stream the JSON payload into the request body
        $jsonString = json_encode($payload, JSON_THROW_ON_ERROR);
        $body = $this->streamFactory->createStream($jsonString);
        $request = $request->withBody($body);

        // 3. Send via PSR-18 client
        $response = $this->client->sendRequest($request);

        return json_decode((string)$response->getBody(), true, flags: JSON_THROW_ON_ERROR);
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

        $this->log()->debug('Sending Zabbix JSON-RPC batch request.', [
            'methods' => array_map(static fn (Request $request): string => $request->method(), $requests),
        ]);

        $response = $this->client->call($this->batchPayload($requests));

        $this->log()->debug('Received Zabbix JSON-RPC batch response.', [
            'methods' => array_map(static fn (Request $request): string => $request->method(), $requests),
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
