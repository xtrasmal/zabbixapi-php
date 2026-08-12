<?php

declare(strict_types=1);

namespace Tests\Clients;

use GuzzleHttp\Client as GuzzleClient;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Middleware;
use GuzzleHttp\Psr7\Response as HttpResponse;
use Idiot\Zabbix\Clients\HttpClient;
use Idiot\Zabbix\Clients\JsonRpcClient;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;
use TypeError;
use UnexpectedValueException;

final class JsonRpcClientTest extends TestCase
{
    public function testCallUsesInjectedHttpTransport(): void
    {
        $history = [];
        $client = new JsonRpcClient(new HttpClient(self::guzzle([
            new HttpResponse(200, [], '{"jsonrpc":"2.0","id":1,"result":{"hostid":"10105"}}'),
        ], $history)));

        $response = $client->call(
            url: 'https://zabbix.example/api_jsonrpc.php',
            method: 'host.get',
            id: 1,
            params: ['output' => ['hostid']],
            bearerToken: 'secret',
        );

        self::assertSame(['hostid' => '10105'], $response->result);
        self::assertSame('Bearer secret', $history[0]['request']->getHeaderLine('Authorization'));
        self::assertSame([
            'jsonrpc' => '2.0',
            'method' => 'host.get',
            'id' => 1,
            'params' => ['output' => ['hostid']],
        ], json_decode((string)$history[0]['request']->getBody(), true, flags: JSON_THROW_ON_ERROR));
    }

    public function testBatchUsesInjectedHttpTransportAndOrdersResponsesByRequestId(): void
    {
        $history = [];
        $client = new JsonRpcClient(new HttpClient(self::guzzle([
            new HttpResponse(200, [], '[{"jsonrpc":"2.0","id":2,"result":[{"hostid":"10105"}]},{"jsonrpc":"2.0","id":1,"result":"7.2.0"}]'),
        ], $history)));

        $responses = $client->batch(
            url: 'https://zabbix.example/api_jsonrpc.php',
            calls: [
                [
                    'method' => 'apiinfo.version',
                    'id' => 1,
                    'params' => [],
                ],
                [
                    'method' => 'host.get',
                    'id' => 2,
                    'params' => ['output' => ['hostid']],
                ],
            ],
            bearerToken: 'secret',
        );

        self::assertSame('7.2.0', $responses[0]->result);
        self::assertSame([['hostid' => '10105']], $responses[1]->result);
        self::assertSame('Bearer secret', $history[0]['request']->getHeaderLine('Authorization'));
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
        ], json_decode((string)$history[0]['request']->getBody(), true, flags: JSON_THROW_ON_ERROR));
    }

    public function testSingleQueryEncodesJsonRpc20RequestObject(): void
    {
        self::assertSame([
            'jsonrpc' => '2.0',
            'method' => 'subtract',
            'id' => 1,
            'params' => [42, 23],
        ], self::encode(
            (self::client())->query('subtract', 1, [42, 23]),
        ));
    }

    public function testSeveralQueriesEncodeAsBatchArray(): void
    {
        self::assertSame([
            [
                'jsonrpc' => '2.0',
                'method' => 'sum',
                'id' => '1',
                'params' => [1, 2, 4],
            ],
            [
                'jsonrpc' => '2.0',
                'method' => 'subtract',
                'id' => '2',
                'params' => [42, 23],
            ],
        ], self::encode(
            (self::client())
                ->query('sum', '1', [1, 2, 4])
                ->query('subtract', '2', [42, 23]),
        ));
    }

    public function testNotificationEncodesWithoutId(): void
    {
        self::assertSame([
            'jsonrpc' => '2.0',
            'method' => 'update',
            'params' => [1, 2, 3, 4, 5],
        ], self::encode(
            (self::client())->notify('update', [1, 2, 3, 4, 5]),
        ));
    }

    public function testBatchCanMixRequestsAndNotifications(): void
    {
        self::assertSame([
            [
                'jsonrpc' => '2.0',
                'method' => 'sum',
                'id' => '1',
                'params' => [1, 2, 4],
            ],
            [
                'jsonrpc' => '2.0',
                'method' => 'notify_hello',
                'params' => [7],
            ],
        ], self::encode(
            (self::client())
                ->query('sum', '1', [1, 2, 4])
                ->notify('notify_hello', [7]),
        ));
    }

    public function testQueryWithoutParamsOmitsOptionalParamsMember(): void
    {
        self::assertSame([
            'jsonrpc' => '2.0',
            'method' => 'host.get',
            'id' => 1,
        ], self::encode(
            (self::client())->query('host.get', 1),
        ));
    }

    public function testNotificationWithoutParamsOmitsOptionalParamsMember(): void
    {
        self::assertSame([
            'jsonrpc' => '2.0',
            'method' => 'foobar',
        ], self::encode(
            (self::client())->notify('foobar'),
        ));
    }

    /**
     * @param int|string|null $id
     */
    #[DataProvider('validIds')]
    public function testQueryAllowsJsonRpcScalarIds(int|string|null $id): void
    {
        self::assertSame($id, self::encode(
            (self::client())->query('host.get', $id),
        )['id']);
    }

    public function testQueryRejectsFractionalNumberIds(): void
    {
        $this->expectException(TypeError::class);

        /** @phpstan-ignore-next-line intentional invalid input */
        (self::client())->query('host.get', 1.25);
    }

    public function testQueryRejectsReservedRpcMethodNames(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('Methods beginning with "rpc." are reserved.');

        (self::client())->query('rpc.health', 1);
    }

    public function testNotificationRejectsReservedRpcMethodNames(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('Methods beginning with "rpc." are reserved.');

        (self::client())->notify('rpc.health');
    }

    public function testMethodNamesArePreservedCaseSensitively(): void
    {
        self::assertSame('Host.Get', self::encode(
            (self::client())->query('Host.Get', 1),
        )['method']);
    }

    public function testPositionalParamsEncodeAsJsonArray(): void
    {
        self::assertSame([42, 23], self::encode(
            (self::client())->query('subtract', 1, [42, 23]),
        )['params']);
    }

    public function testNamedParamsEncodeAsJsonObjectWithCaseSensitiveKeys(): void
    {
        $payload = (self::client())
            ->query('subtract', 1, ['minuend' => 42, 'Subtrahend' => 23])
            ->encode();

        self::assertSame(
            '{"jsonrpc":"2.0","method":"subtract","id":1,"params":{"minuend":42,"Subtrahend":23}}',
            $payload,
        );
    }

    public function testQueryRejectsScalarParams(): void
    {
        $this->expectException(TypeError::class);

        /** @phpstan-ignore-next-line intentional invalid input */
        (self::client())->query('host.get', 1, 'extend');
    }

    public function testDecodeRejectsEmptyBatchResponseArray(): void
    {
        $this->expectException(UnexpectedValueException::class);
        $this->expectExceptionMessage('Empty batch responses are invalid JSON-RPC responses.');

        self::decode([]);
    }

    #[DataProvider('nonObjectResponses')]
    public function testDecodeRejectsNonObjectResponses(array $response): void
    {
        $this->expectException(UnexpectedValueException::class);
        $this->expectExceptionMessage('Not a JSON-RPC 2.0 response.');

        self::decode($response);
    }

    public function testDecodeRejectsResponseWithoutJsonRpcVersion(): void
    {
        $this->expectException(UnexpectedValueException::class);
        $this->expectExceptionMessage('Not a JSON-RPC 2.0 response.');

        self::decode(['id' => 1, 'result' => 19]);
    }

    /**
     * @param mixed $version
     */
    #[DataProvider('invalidJsonRpcVersions')]
    public function testDecodeRejectsResponseWithoutExactJsonRpc20Version(mixed $version): void
    {
        $this->expectException(UnexpectedValueException::class);
        $this->expectExceptionMessage('Not a JSON-RPC 2.0 response.');

        self::decode([
            'jsonrpc' => $version,
            'id' => 1,
            'result' => 19,
        ]);
    }

    public function testDecodeRequiresIdMember(): void
    {
        $this->expectException(UnexpectedValueException::class);
        $this->expectExceptionMessage('JSON-RPC responses must contain an id.');

        self::decode(['jsonrpc' => '2.0', 'result' => 19]);
    }

    /**
     * @param int|string|null $id
     */
    #[DataProvider('validIds')]
    public function testDecodeAcceptsJsonRpcScalarIds(int|string|null $id): void
    {
        self::assertSame($id, self::decode([
            'jsonrpc' => '2.0',
            'id' => $id,
            'result' => 19,
        ])[0]->id);
    }

    /**
     * @param mixed $id
     */
    #[DataProvider('invalidIds')]
    public function testDecodeRejectsInvalidResponseIds(mixed $id): void
    {
        $this->expectException(UnexpectedValueException::class);
        $this->expectExceptionMessage('JSON-RPC response ids must be strings, integers, or null.');

        self::decode([
            'jsonrpc' => '2.0',
            'id' => $id,
            'result' => 19,
        ]);
    }

    public function testDecodePreservesResultResponseIdForCorrelation(): void
    {
        $response = self::decode(['jsonrpc' => '2.0', 'id' => 'abc', 'result' => 19])[0];

        self::assertSame('abc', $response->id);
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
        $this->expectException(UnexpectedValueException::class);
        $this->expectExceptionMessage('JSON-RPC responses must contain exactly one of result or error.');

        self::decode(['jsonrpc' => '2.0', 'id' => 1]);
    }

    public function testDecodeRejectsResponseWithBothResultAndError(): void
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

    public function testDecodeAcceptsNullResultAsSuccessfulResultMember(): void
    {
        $response = self::decode(['jsonrpc' => '2.0', 'id' => 1, 'result' => null])[0];

        self::assertNull($response->result);
        self::assertNull($response->error);
    }

    public function testDecodeRequiresErrorMemberToBeObject(): void
    {
        $this->expectException(UnexpectedValueException::class);
        $this->expectExceptionMessage('JSON-RPC response errors must be objects.');

        self::decode(['jsonrpc' => '2.0', 'id' => 1, 'error' => 'Invalid params']);
    }

    public function testDecodeRequiresErrorCode(): void
    {
        $this->expectException(UnexpectedValueException::class);
        $this->expectExceptionMessage('JSON-RPC error objects must contain an integer code.');

        self::decode(['jsonrpc' => '2.0', 'id' => 1, 'error' => ['message' => 'Invalid params']]);
    }

    /**
     * @param mixed $code
     */
    #[DataProvider('nonIntegerErrorCodes')]
    public function testDecodeRequiresErrorCodeToBeInteger(mixed $code): void
    {
        $this->expectException(UnexpectedValueException::class);
        $this->expectExceptionMessage('JSON-RPC error objects must contain an integer code.');

        self::decode([
            'jsonrpc' => '2.0',
            'id' => 1,
            'error' => [
                'code' => $code,
                'message' => 'Invalid params',
            ],
        ]);
    }

    public function testDecodeRequiresErrorMessage(): void
    {
        $this->expectException(UnexpectedValueException::class);
        $this->expectExceptionMessage('JSON-RPC error objects must contain a string message.');

        self::decode(['jsonrpc' => '2.0', 'id' => 1, 'error' => ['code' => -32602]]);
    }

    /**
     * @param mixed $message
     */
    #[DataProvider('nonStringErrorMessages')]
    public function testDecodeRequiresErrorMessageToBeString(mixed $message): void
    {
        $this->expectException(UnexpectedValueException::class);
        $this->expectExceptionMessage('JSON-RPC error objects must contain a string message.');

        self::decode([
            'jsonrpc' => '2.0',
            'id' => 1,
            'error' => [
                'code' => -32602,
                'message' => $message,
            ],
        ]);
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
            ['jsonrpc' => '2.0', 'id' => '1', 'result' => 7],
            ['jsonrpc' => '2.0', 'id' => '2', 'result' => 19],
        ]);

        self::assertCount(2, $responses);
        self::assertSame('1', $responses[0]->id);
        self::assertSame(7, $responses[0]->result);
        self::assertSame('2', $responses[1]->id);
        self::assertSame(19, $responses[1]->result);
    }

    public function testDecodePreservesBatchResponseIdsReturnedInAnyOrder(): void
    {
        $responses = self::decode([
            ['jsonrpc' => '2.0', 'id' => '2', 'result' => 19],
            ['jsonrpc' => '2.0', 'id' => '1', 'result' => 7],
        ]);

        self::assertSame(['2', '1'], array_map(static fn ($response): int|string|null => $response->id, $responses));
        self::assertSame([19, 7], array_map(static fn ($response): mixed => $response->result, $responses));
    }

    /**
     * @return iterable<string, array{int|string|null}>
     */
    public static function validIds(): iterable
    {
        yield 'integer' => [1];
        yield 'string' => ['1'];
        yield 'null' => [null];
    }

    /**
     * @return iterable<string, array{mixed}>
     */
    public static function invalidIds(): iterable
    {
        yield 'boolean' => [true];
        yield 'object' => [['unexpected' => 'object']];
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
    public static function invalidJsonRpcVersions(): iterable
    {
        yield 'missing string minor' => ['2'];
        yield 'one dot zero' => ['1.0'];
        yield 'number' => [2.0];
        yield 'different case' => ['2.0 '];
    }

    /**
     * @return iterable<string, array{mixed}>
     */
    public static function nonIntegerErrorCodes(): iterable
    {
        yield 'float' => [-32602.5];
        yield 'string' => ['-32602'];
        yield 'null' => [null];
    }

    /**
     * @return iterable<string, array{mixed}>
     */
    public static function nonStringErrorMessages(): iterable
    {
        yield 'integer' => [123];
        yield 'array' => [['Invalid params']];
        yield 'null' => [null];
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
     * @return array<mixed>
     */
    private static function encode(JsonRpcClient $client): array
    {
        $payload = $client->encode();

        self::assertIsString($payload);

        return json_decode($payload, true, flags: JSON_THROW_ON_ERROR);
    }

    /**
     * @param array<string, mixed>|list<mixed> $payload
     *
     * @return list<\Idiot\Zabbix\JsonRpc\Response>
     */
    private static function decode(array $payload): array
    {
        return (self::client())->decode($payload);
    }

    private static function client(): JsonRpcClient
    {
        return new JsonRpcClient(new HttpClient());
    }

    /**
     * @param list<HttpResponse>               $responses
     * @param array<int, array<string, mixed>> $history
     */
    private static function guzzle(array $responses, array &$history): GuzzleClient
    {
        $stack = HandlerStack::create(new MockHandler($responses));
        $stack->push(Middleware::history($history));

        return new GuzzleClient(['handler' => $stack]);
    }
}
