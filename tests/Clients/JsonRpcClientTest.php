<?php

declare(strict_types=1);

namespace Tests\Clients;

use Idiot\Zabbix\Api\Requests\ApiinfoVersionRequest;
use Idiot\Zabbix\Api\Requests\HostGetRequest;
use Idiot\Zabbix\Clients\JsonRpcClient;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;
use Tests\Support\RecordingClient;

final class JsonRpcClientTest extends TestCase
{
    public function testCallUsesInjectedHttpTransport(): void
    {
        $transport = new RecordingClient([
            '{"jsonrpc":"2.0","id":1,"result":{"hostid":"10105"}}',
        ]);
        $client = self::client($transport);

        $response = $client->call(
            request: HostGetRequest::fromParams(['output' => ['hostid']]),
        );

        self::assertSame(['hostid' => '10105'], $response->result);
        self::assertSame('https://zabbix.example/api_jsonrpc.php', (string)$transport->requests[0]->getUri());
        self::assertSame('Bearer secret', $transport->requests[0]->getHeaderLine('Authorization'));
        self::assertSame('application/json-rpc', $transport->requests[0]->getHeaderLine('Content-Type'));
        self::assertSame([
            'jsonrpc' => '2.0',
            'method' => 'host.get',
            'id' => 1,
            'params' => ['output' => ['hostid']],
        ], self::requestBody($transport, 0));
    }

    public function testBatchUsesInjectedHttpTransportAndOrdersResponsesByRequestId(): void
    {
        $transport = new RecordingClient([
            '[{"jsonrpc":"2.0","id":2,"result":[{"hostid":"10105"}]},{"jsonrpc":"2.0","id":1,"result":"7.2.0"}]',
        ]);
        $client = self::client($transport);

        $responses = $client->batch(
            requests: [
                ApiinfoVersionRequest::fromParams([]),
                HostGetRequest::fromParams(['output' => ['hostid']]),
            ],
        );

        self::assertSame('7.2.0', $responses[0]->result);
        self::assertSame([['hostid' => '10105']], $responses[1]->result);
        self::assertSame('Bearer secret', $transport->requests[0]->getHeaderLine('Authorization'));
        self::assertSame([
            [
                'jsonrpc' => '2.0',
                'method' => 'apiinfo.version',
                'id' => 1,
                'params' => [],
            ],
            [
                'jsonrpc' => '2.0',
                'method' => 'host.get',
                'id' => 2,
                'params' => ['output' => ['hostid']],
            ],
        ], self::requestBody($transport, 0));
    }

    public function testBatchReturnsErrorForEmptyRequestList(): void
    {
        $response = self::client(new RecordingClient())->batch([])[0];

        self::assertNull($response->id);
        self::assertSame([
            'code' => -32600,
            'message' => 'Cannot send an empty JSON-RPC batch.',
        ], $response->error);
    }

    public function testDecodeReturnsErrorForEmptyBatchResponseArray(): void
    {
        self::assertDecodeError([], 'Empty batch responses are invalid JSON-RPC responses.');
    }

    #[DataProvider('nonObjectResponses')]
    public function testDecodeReturnsErrorForNonObjectResponses(array $response): void
    {
        self::assertDecodeError($response, 'Not a JSON-RPC 2.0 response.');
    }

    public function testDecodeRequiresIdMember(): void
    {
        self::assertDecodeError(['jsonrpc' => '2.0', 'result' => 19], 'JSON-RPC responses must contain an id.');
    }

    public function testDecodePreservesResultResponseIdForCorrelation(): void
    {
        $response = self::decode(['jsonrpc' => '2.0', 'id' => 1, 'result' => 19])[0];

        self::assertSame(1, $response->id);
        self::assertSame(19, $response->result);
    }

    public function testDecodePreservesNullIdForParseOrInvalidRequestErrors(): void
    {
        $response = self::decode([
            'jsonrpc' => '2.0',
            'id' => null,
            'error' => ['code' => -32700, 'message' => 'Parse error'],
        ])[0];

        self::assertNull($response->id);
        self::assertSame(-32700, $response->error['code']);
    }

    public function testDecodeRequiresExactlyOneOfResultOrError(): void
    {
        self::assertDecodeError(
            ['jsonrpc' => '2.0', 'id' => 1],
            'JSON-RPC responses must contain exactly one of result or error.',
            id: 1,
        );
    }

    public function testDecodeReturnsErrorForResponseWithBothResultAndError(): void
    {
        self::assertDecodeError([
            'jsonrpc' => '2.0',
            'id' => 1,
            'result' => 19,
            'error' => ['code' => -32603, 'message' => 'Internal error'],
        ], 'JSON-RPC responses must contain exactly one of result or error.', id: 1);
    }

    public function testDecodeAcceptsNullResultAsSuccessfulResultMember(): void
    {
        $response = self::decode(['jsonrpc' => '2.0', 'id' => 1, 'result' => null])[0];

        self::assertNull($response->result);
        self::assertNull($response->error);
    }

    public function testDecodeRequiresErrorMemberToBeObject(): void
    {
        self::assertDecodeError(
            ['jsonrpc' => '2.0', 'id' => 1, 'error' => 'Invalid params'],
            'JSON-RPC response errors must be objects.',
            id: 1,
        );
    }

    /**
     * @param mixed $data
     */
    #[DataProvider('errorDataValues')]
    public function testDecodePreservesOptionalErrorData(mixed $data): void
    {
        $response = self::decode([
            'jsonrpc' => '2.0',
            'id' => 1,
            'error' => [
                'code' => -32602,
                'message' => 'Invalid params',
                'data' => $data,
            ],
        ])[0];

        self::assertSame($data, $response->error['data']);
    }

    public function testDecodeAllowsErrorDataToBeOmitted(): void
    {
        $response = self::decode([
            'jsonrpc' => '2.0',
            'id' => 1,
            'error' => ['code' => -32601, 'message' => 'Method not found'],
        ])[0];

        self::assertSame([
            'code' => -32601,
            'message' => 'Method not found',
        ], $response->error);
    }

    public function testDecodeBatchResponseArray(): void
    {
        $responses = self::decode([
            ['jsonrpc' => '2.0', 'id' => 1, 'result' => 7],
            ['jsonrpc' => '2.0', 'id' => 2, 'result' => 19],
        ]);

        self::assertCount(2, $responses);
        self::assertSame(1, $responses[0]->id);
        self::assertSame(7, $responses[0]->result);
        self::assertSame(2, $responses[1]->id);
        self::assertSame(19, $responses[1]->result);
    }

    public function testDecodePreservesBatchResponseIdsReturnedInAnyOrder(): void
    {
        $responses = self::decode([
            ['jsonrpc' => '2.0', 'id' => 2, 'result' => 19],
            ['jsonrpc' => '2.0', 'id' => 1, 'result' => 7],
        ]);

        self::assertSame([2, 1], array_map(static fn ($response): mixed => $response->id, $responses));
        self::assertSame([19, 7], array_map(static fn ($response): mixed => $response->result, $responses));
    }

    /**
     * @return iterable<string, array{array}>
     */
    public static function nonObjectResponses(): iterable
    {
        yield 'string' => [['ok']];
        yield 'number' => [[1]];
        yield 'boolean' => [[true]];
        yield 'null' => [[null]];
    }

    /**
     * @return iterable<string, array{mixed}>
     */
    public static function errorDataValues(): iterable
    {
        yield 'primitive' => ['bad input'];
        yield 'object' => [['field' => 'hostids']];
        yield 'array' => [[1, 2, 3]];
        yield 'null' => [null];
    }

    /**
     * @param array<string, mixed>|list<mixed> $payload
     *
     * @return list<\Idiot\Zabbix\Clients\JsonRpcResponse>
     */
    private static function decode(array $payload): array
    {
        return self::client(new RecordingClient())->decode($payload);
    }

    /**
     * @param array<string, mixed>|list<mixed> $payload
     */
    private static function assertDecodeError(
        array $payload,
        string $message,
        int $code = -32600,
        int|string|null $id = null,
    ): void {
        $response = self::decode($payload)[0];

        self::assertSame($id, $response->id);
        self::assertSame([
            'code' => $code,
            'message' => $message,
        ], $response->error);
    }

    private static function client(RecordingClient $transport): JsonRpcClient
    {
        return new JsonRpcClient([
            'url' => 'https://zabbix.example/api_jsonrpc.php',
            'token' => 'secret',
            'client' => $transport,
        ]);
    }

    /**
     * @return array<string, mixed>|list<mixed>
     */
    private static function requestBody(RecordingClient $transport, int $index): array
    {
        return json_decode((string)$transport->requests[$index]->getBody(), true, flags: JSON_THROW_ON_ERROR);
    }
}
