<?php

declare(strict_types=1);

namespace Tests\JsonRpc;

use Idiot\Zabbix\Clients\HttpClient;
use Idiot\Zabbix\Clients\JsonRpcClient;
use Idiot\Zabbix\JsonRpc\Request;
use Idiot\Zabbix\JsonRpc\Response;
use InvalidArgumentException;
use PHPUnit\Framework\TestCase;
use UnexpectedValueException;

final class RequestTest extends TestCase
{
    public function testNotificationSerializationOmitsIdAndParams(): void
    {
        $message = Request::notification('event.ping');

        self::assertSame([
            'jsonrpc' => Request::VERSION,
            'method' => 'event.ping',
        ], $message->jsonSerialize());
    }

    public function testRequestSerializationIncludesIdAndParams(): void
    {
        $message = Request::request('host.get', 1, ['output' => 'extend']);

        self::assertSame([
            'jsonrpc' => Request::VERSION,
            'method' => 'host.get',
            'id' => 1,
            'params' => ['output' => 'extend'],
        ], $message->jsonSerialize());
    }

    public function testRequestSerializationIncludesExplicitEmptyParams(): void
    {
        $message = Request::request('host.get', 1, []);

        self::assertSame([
            'jsonrpc' => Request::VERSION,
            'method' => 'host.get',
            'id' => 1,
            'params' => [],
        ], $message->jsonSerialize());
    }

    public function testRequestSerializationCanIncludeExplicitNullId(): void
    {
        $message = Request::request('host.get', null);

        self::assertSame([
            'jsonrpc' => Request::VERSION,
            'method' => 'host.get',
            'id' => null,
        ], $message->jsonSerialize());
    }

    public function testReservedRpcMethodNamesAreRejected(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('Methods beginning with "rpc." are reserved.');

        Request::request('rpc.health', 1);
    }

    public function testResponseSerializationIncludesJsonRpcErrorEnvelope(): void
    {
        $response = Response::fromError(1, [
            'code' => -32601,
            'message' => 'Method not found',
        ]);

        self::assertSame([
            'jsonrpc' => Request::VERSION,
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
            'jsonrpc' => Request::VERSION,
            'id' => 1,
            'error' => [
                'code' => -32602,
                'message' => 'Invalid params',
                'data' => ['field' => 'hostids'],
            ],
        ], Response::fromError(1, [
            'code' => -32602,
            'message' => 'Invalid params',
            'data' => ['field' => 'hostids'],
        ])->jsonSerialize());
    }

    public function testResponseSerializationIncludesNullResultOnSuccess(): void
    {
        self::assertSame([
            'jsonrpc' => Request::VERSION,
            'id' => 1,
            'result' => null,
        ], Response::fromResult(1, null)->jsonSerialize());
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
     * @return list<Response>
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
