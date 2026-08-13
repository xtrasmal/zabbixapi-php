<?php

declare(strict_types=1);

namespace Tests\JsonRpc;

use GuzzleHttp\Client as GuzzleClient;
use Idiot\Zabbix\Clients\HttpClient;
use Idiot\Zabbix\Clients\JsonRpcClient;
use Idiot\Zabbix\Clients\JsonRpcResponse;
use PHPUnit\Framework\TestCase;

final class ResponseTest extends TestCase
{
    public function testResponseSerializationIncludesJsonRpcErrorEnvelope(): void
    {
        $response = JsonRpcResponse::fromError(1, [
            'code' => -32601,
            'message' => 'Method not found',
        ]);

        self::assertSame([
            'jsonrpc' => JsonRpcResponse::VERSION,
            'id' => 1,
            'error' => [
                'code' => -32601,
                'message' => 'Method not found',
            ],
        ], $response->jsonSerialize());
    }

    public function testResponseSerializationPreservesErrorPayload(): void
    {
        self::assertSame([
            'jsonrpc' => JsonRpcResponse::VERSION,
            'id' => 1,
            'error' => [
                'code' => -32602,
                'message' => 'Invalid params',
                'data' => ['field' => 'hostids'],
            ],
        ], JsonRpcResponse::fromError(1, [
            'code' => -32602,
            'message' => 'Invalid params',
            'data' => ['field' => 'hostids'],
        ])->jsonSerialize());
    }

    public function testResponseSerializationIncludesNullResultOnSuccess(): void
    {
        self::assertSame([
            'jsonrpc' => JsonRpcResponse::VERSION,
            'id' => 1,
            'result' => null,
        ], JsonRpcResponse::fromResult(1, null)->jsonSerialize());
    }

    public function testDecodeReturnsErrorForEmptyBatchResponseArray(): void
    {
        self::assertDecodeError([], 'Empty batch responses are invalid JSON-RPC responses.');
    }

    public function testDecodeReturnsErrorForResponsesWithoutId(): void
    {
        self::assertDecodeError(['jsonrpc' => '2.0', 'result' => 19], 'JSON-RPC responses must contain an id.');
    }

    public function testDecodeReturnsErrorForResponsesWithBothResultAndError(): void
    {
        self::assertDecodeError([
            'jsonrpc' => '2.0',
            'id' => 1,
            'result' => 19,
            'error' => ['code' => -32603, 'message' => 'Internal error'],
        ], 'JSON-RPC responses must contain exactly one of result or error.', id: 1);
    }

    /**
     * @param array<string, mixed>|list<mixed> $payload
     *
     * @return list<JsonRpcResponse>
     */
    private static function decode(array $payload): array
    {
        return (self::client())->decode($payload);
    }

    /**
     * @param array<string, mixed>|list<mixed> $payload
     */
    private static function assertDecodeError(
        array $payload,
        string $message,
        int|string|null $id = null,
    ): void {
        $response = self::decode($payload)[0];

        self::assertSame($id, $response->id);
        self::assertSame([
            'code' => -32600,
            'message' => $message,
        ], $response->error);
    }

    private static function client(): JsonRpcClient
    {
        return new JsonRpcClient(new HttpClient(new GuzzleClient()));
    }
}
