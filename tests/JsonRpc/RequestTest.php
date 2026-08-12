<?php

declare(strict_types=1);

namespace Tests\JsonRpc;

use Idiot\Zabbix\Clients\HttpClient;
use Idiot\Zabbix\Clients\JsonRpcClient;
use Idiot\Zabbix\Clients\JsonRpcRequest;
use Idiot\Zabbix\Clients\JsonRpcResponse;
use InvalidArgumentException;
use PHPUnit\Framework\TestCase;
use UnexpectedValueException;

final class RequestTest extends TestCase
{
    public function testNotificationSerializationOmitsIdAndParams(): void
    {
        $message = JsonRpcRequest::notification('event.ping');

        self::assertSame([
            'jsonrpc' => JsonRpcRequest::VERSION,
            'method' => 'event.ping',
        ], $message->jsonSerialize());
    }

    public function testRequestSerializationIncludesIdAndParams(): void
    {
        $message = JsonRpcRequest::request('host.get', 1, ['output' => 'extend']);

        self::assertSame([
            'jsonrpc' => JsonRpcRequest::VERSION,
            'method' => 'host.get',
            'id' => 1,
            'params' => ['output' => 'extend'],
        ], $message->jsonSerialize());
    }

    public function testRequestSerializationIncludesExplicitEmptyParams(): void
    {
        $message = JsonRpcRequest::request('host.get', 1, []);

        self::assertSame([
            'jsonrpc' => JsonRpcRequest::VERSION,
            'method' => 'host.get',
            'id' => 1,
            'params' => [],
        ], $message->jsonSerialize());
    }

    public function testRequestSerializationCanIncludeExplicitNullId(): void
    {
        $message = JsonRpcRequest::request('host.get', null);

        self::assertSame([
            'jsonrpc' => JsonRpcRequest::VERSION,
            'method' => 'host.get',
            'id' => null,
        ], $message->jsonSerialize());
    }

    public function testReservedRpcMethodNamesAreRejected(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('Methods beginning with "rpc." are reserved.');

        JsonRpcRequest::request('rpc.health', 1);
    }

    public function testResponseSerializationIncludesJsonRpcErrorEnvelope(): void
    {
        $response = JsonRpcResponse::fromError(1, [
            'code' => -32601,
            'message' => 'Method not found',
        ]);

        self::assertSame([
            'jsonrpc' => JsonRpcRequest::VERSION,
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
            'jsonrpc' => JsonRpcRequest::VERSION,
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
            'jsonrpc' => JsonRpcRequest::VERSION,
            'id' => 1,
            'result' => null,
        ], JsonRpcResponse::fromResult(1, null)->jsonSerialize());
    }

    public function testDecodeRejectsEmptyBatchResponseArray(): void
    {
        $this->expectException(UnexpectedValueException::class);
        $this->expectExceptionMessage('Empty batch responses are invalid JSON-RPC responses.');

        self::decode([]);
    }

    public function testDecodeRejectsResponsesWithoutId(): void
    {
        $this->expectException(UnexpectedValueException::class);
        $this->expectExceptionMessage('JSON-RPC responses must contain an id.');

        self::decode(['jsonrpc' => '2.0', 'result' => 19]);
    }

    public function testDecodeRejectsResponsesWithBothResultAndError(): void
    {
        $this->expectException(UnexpectedValueException::class);
        $this->expectExceptionMessage('JSON-RPC responses must contain exactly one of result or error.');

        self::decode([
            'jsonrpc' => '2.0',
            'id' => 1,
            'result' => 19,
            'error' => ['code' => -32603, 'message' => 'Internal error'],
        ]);
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

    private static function client(): JsonRpcClient
    {
        return new JsonRpcClient(new HttpClient());
    }
}
