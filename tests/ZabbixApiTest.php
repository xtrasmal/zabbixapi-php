<?php

declare(strict_types=1);

namespace Tests;

use Idiot\Zabbix\Api\Requests\HostGetRequest;
use Idiot\Zabbix\InvalidZabbixRequest;
use Idiot\Zabbix\ZabbixApi;
use Idiot\Zabbix\ZabbixApiException;
use PHPUnit\Framework\TestCase;
use Psr\Http\Message\RequestInterface;
use RuntimeException;
use Tests\Support\RecordingClient;

final class ZabbixApiTest extends TestCase
{
    public function testCanBeConstructedWithConfiguredOptions(): void
    {
        $api = self::zabbixApi([
            'url' => 'https://zabbix.example/api_jsonrpc.php',
            'token' => 'secret',
        ]);

        self::assertInstanceOf(ZabbixApi::class, $api);
    }

    public function testConstructorRejectsEmptyUrl(): void
    {
        $this->expectException(RuntimeException::class);
        $this->expectExceptionMessage('Missing Zabbix URL.');

        self::zabbixApi([
            'url' => '',
            'token' => 'secret',
        ]);
    }

    public function testConstructorRejectsEmptyToken(): void
    {
        $this->expectException(RuntimeException::class);
        $this->expectExceptionMessage('Missing Zabbix API token.');

        self::zabbixApi([
            'url' => 'https://zabbix.example/api_jsonrpc.php',
            'token' => '',
        ]);
    }

    public function testConstructorConfiguresEndpointTokenAndTransport(): void
    {
        $api = self::zabbixApi([
            'url' => 'https://zabbix.example/api_jsonrpc.php',
            'token' => 'secret',
            'verify' => false,
        ], [
            '[{"jsonrpc":"2.0","id":1,"result":"7.2.0"},{"jsonrpc":"2.0","id":2,"result":[{"hostid":"10105"}]}]',
        ], $client);

        self::assertSame([], $client->requests);
        self::assertSame([['hostid' => '10105']], $api->hosts->get(['output' => ['hostid']]));

        self::assertCount(1, $client->requests);
        self::assertSame('https://zabbix.example/api_jsonrpc.php', (string)$client->requests[0]->getUri());
        self::assertSame('application/json-rpc', $client->requests[0]->getHeaderLine('Content-Type'));
        self::assertSame('Bearer secret', $client->requests[0]->getHeaderLine('Authorization'));
        self::assertSame(['apiinfo.version', 'host.get'], self::requestMethods($client->requests[0]));
    }

    public function testConstructorRejectsMissingUrl(): void
    {
        $this->expectException(RuntimeException::class);
        $this->expectExceptionMessage('Missing Zabbix URL.');

        self::zabbixApi([
            'token' => 'secret',
        ]);
    }

    public function testConstructorRejectsCredentialOptions(): void
    {
        $this->expectException(RuntimeException::class);
        $this->expectExceptionMessage('Unknown Zabbix API option: "username".');

        self::zabbixApi([
            'url' => 'https://zabbix.example/api_jsonrpc.php',
            'token' => 'secret',
            'username' => 'Admin',
        ]);
    }

    public function testConstructorRejectsMissingToken(): void
    {
        $this->expectException(RuntimeException::class);
        $this->expectExceptionMessage('Missing Zabbix API token.');

        self::zabbixApi([
            'url' => 'https://zabbix.example/api_jsonrpc.php',
        ]);
    }

    public function testGroupedCallSendsJsonRpc20RequestWithoutBodyAuth(): void
    {
        $api = self::zabbixApi([
            'url' => 'https://zabbix.example/api_jsonrpc.php',
            'token' => 'secret',
        ], [
            '[{"jsonrpc":"2.0","id":1,"result":"7.2.0"},{"jsonrpc":"2.0","id":2,"result":[]}]',
        ], $client);

        $api->hosts->get(['output' => 'extend']);

        $body = self::requestBody($client->requests[0]);

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
                'params' => ['output' => 'extend'],
            ],
        ], $body);
        self::assertArrayNotHasKey('auth', $body[0]);
        self::assertArrayNotHasKey('auth', $body[1]);
    }

    public function testRequestValidationStopsTransport(): void
    {
        $api = self::zabbixApi([
            'url' => 'https://zabbix.example/api_jsonrpc.php',
            'token' => 'secret',
        ], [], $client);

        $this->expectException(InvalidZabbixRequest::class);
        $this->expectExceptionMessage("Invalid params for 'host.get'");

        try {
            $api->hosts->get(['output' => 123]);
        } finally {
            self::assertSame([], $client->requests);
        }
    }

    public function testRequestDecodesJsonRpcResult(): void
    {
        $api = self::zabbixApi([
            'url' => 'https://zabbix.example/api_jsonrpc.php',
            'token' => 'secret',
        ], [
            '[{"jsonrpc":"2.0","id":1,"result":"7.2.0"},{"jsonrpc":"2.0","id":2,"result":{"hostid":"10105"}}]',
        ], $client);

        self::assertSame(['hostid' => '10105'], $api->request(HostGetRequest::fromParams([])));
    }

    public function testRequestExecutesZabbixRequestObject(): void
    {
        $api = self::zabbixApi([
            'url' => 'https://zabbix.example/api_jsonrpc.php',
            'token' => 'secret',
        ], [
            '[{"jsonrpc":"2.0","id":1,"result":"7.2.0"},{"jsonrpc":"2.0","id":2,"result":[{"hostid":"10105"}]}]',
        ], $client);

        self::assertSame(
            [['hostid' => '10105']],
            $api->request(HostGetRequest::fromParams(['output' => ['hostid']])),
        );

        self::assertSame(['apiinfo.version', 'host.get'], self::requestMethods($client->requests[0]));
    }

    public function testDomainApiPropertiesBuildAndExecuteRequests(): void
    {
        $api = self::zabbixApi([
            'url' => 'https://zabbix.example/api_jsonrpc.php',
            'token' => 'secret',
        ], [
            '[{"jsonrpc":"2.0","id":1,"result":"7.2.0"},{"jsonrpc":"2.0","id":2,"result":[{"hostid":"10105","host":"srv-01"}]}]',
        ], $client);

        self::assertSame(
            [['hostid' => '10105', 'host' => 'srv-01']],
            $api->hosts->get([
                'output' => ['hostid', 'host'],
                'filter' => ['host' => ['srv-01']],
            ]),
        );

        self::assertSame([
            'jsonrpc' => '2.0',
            'method' => 'host.get',
            'id' => 2,
            'params' => [
                'output' => ['hostid', 'host'],
                'filter' => ['host' => ['srv-01']],
            ],
        ], self::requestBody($client->requests[0])[1]);
    }

    public function testDomainApiPropertiesValidateParamsBeforeTransport(): void
    {
        $api = self::zabbixApi([
            'url' => 'https://zabbix.example/api_jsonrpc.php',
            'token' => 'secret',
        ], [], $client);

        $this->expectException(InvalidZabbixRequest::class);
        $this->expectExceptionMessage("Invalid params for 'host.get'");

        try {
            $api->hosts->get(['output' => 123]);
        } finally {
            self::assertSame([], $client->requests);
        }
    }

    public function testPublicApiGroupsAcceptPlainArrayParams(): void
    {
        $api = self::zabbixApi([
            'url' => 'https://zabbix.example/api_jsonrpc.php',
            'token' => 'secret',
        ], [
            '[{"jsonrpc":"2.0","id":1,"result":"7.2.0"},{"jsonrpc":"2.0","id":2,"result":{"groupids":["17"]}}]',
            '{"jsonrpc":"2.0","id":1,"result":[{"templateid":"10001"}]}',
            '{"jsonrpc":"2.0","id":1,"result":[{"itemid":"30001"}]}',
        ], $client);

        self::assertSame(['groupids' => ['17']], $api->hostGroups->create(['name' => 'Linux servers']));
        self::assertSame([['templateid' => '10001']], $api->templates->get([
            'filter' => ['host' => ['Template OS Linux']],
            'output' => ['templateid'],
        ]));
        self::assertSame([['itemid' => '30001']], $api->items->get([
            'hostids' => ['10105'],
            'output' => ['itemid'],
        ]));

        $firstBody = self::requestBody($client->requests[0]);
        $secondBody = self::requestBody($client->requests[1]);
        $thirdBody = self::requestBody($client->requests[2]);

        self::assertSame('hostgroup.create', $firstBody[1]['method']);
        self::assertSame(['name' => 'Linux servers'], $firstBody[1]['params']);
        self::assertSame('template.get', $secondBody['method']);
        self::assertSame([
            'filter' => ['host' => ['Template OS Linux']],
            'output' => ['templateid'],
        ], $secondBody['params']);
        self::assertSame('item.get', $thirdBody['method']);
        self::assertSame([
            'hostids' => ['10105'],
            'output' => ['itemid'],
        ], $thirdBody['params']);
    }

    public function testUserLogoutCanBeCalledThroughPublicApiGroup(): void
    {
        $api = self::zabbixApi([
            'url' => 'https://zabbix.example/api_jsonrpc.php',
            'token' => 'secret',
        ], [
            '[{"jsonrpc":"2.0","id":1,"result":"7.2.0"},{"jsonrpc":"2.0","id":2,"result":true}]',
        ], $client);

        self::assertTrue($api->users->logout());

        $body = self::requestBody($client->requests[0]);

        self::assertSame('Bearer secret', $client->requests[0]->getHeaderLine('Authorization'));
        self::assertSame('user.logout', $body[1]['method']);
        self::assertSame([], $body[1]['params']);
    }

    public function testApiVersionLookupIsLazyAndCached(): void
    {
        $api = self::zabbixApi([
            'url' => 'https://zabbix.example/api_jsonrpc.php',
            'token' => 'secret',
        ], [
            '{"jsonrpc":"2.0","id":1,"result":"7.2.0"}',
        ], $client);

        self::assertSame([], $client->requests);
        self::assertSame('7.2.0', $api->getApiVersion());
        self::assertSame('7.2.0', $api->getApiVersion());

        self::assertCount(1, $client->requests);
        self::assertSame('Bearer secret', $client->requests[0]->getHeaderLine('Authorization'));
        self::assertSame('apiinfo.version', self::requestBody($client->requests[0])['method']);
    }

    public function testBatchQueuesGroupedCallsAndReturnsResultsInOrder(): void
    {
        $api = self::zabbixApi([
            'url' => 'https://zabbix.example/api_jsonrpc.php',
            'token' => 'secret',
        ], [
            '[{"jsonrpc":"2.0","id":1,"result":"7.2.0"},{"jsonrpc":"2.0","id":2,"result":[{"hostid":"10105"}]},{"jsonrpc":"2.0","id":3,"result":[{"itemid":"30001"}]}]',
        ], $client);

        $results = $api->batch(function ($batch): void {
            $batch->hosts->get([
                'filter' => ['host' => ['srv-01']],
                'output' => ['hostid'],
            ]);
            $batch->items->get([
                'hostids' => ['10105'],
                'output' => ['itemid'],
            ]);
        });

        self::assertSame([
            [['hostid' => '10105']],
            [['itemid' => '30001']],
        ], $results);

        $body = self::requestBody($client->requests[0]);

        self::assertSame('Bearer secret', $client->requests[0]->getHeaderLine('Authorization'));
        self::assertSame(['apiinfo.version', 'host.get', 'item.get'], array_column($body, 'method'));
        self::assertSame([1, 2, 3], array_column($body, 'id'));
        self::assertSame([
            'filter' => ['host' => ['srv-01']],
            'output' => ['hostid'],
        ], $body[1]['params']);
        self::assertSame([
            'hostids' => ['10105'],
            'output' => ['itemid'],
        ], $body[2]['params']);
    }

    public function testBatchArrowCallbackQueuesReturnedRequestOnce(): void
    {
        $api = self::zabbixApi([
            'url' => 'https://zabbix.example/api_jsonrpc.php',
            'token' => 'secret',
        ], [
            '[{"jsonrpc":"2.0","id":1,"result":"7.2.0"},{"jsonrpc":"2.0","id":2,"result":[{"hostid":"10105"}]}]',
        ], $client);

        $results = $api->batch(fn ($batch) => $batch->hosts->get(['output' => ['hostid']]));

        self::assertSame([[['hostid' => '10105']]], $results);
        self::assertSame(['apiinfo.version', 'host.get'], self::requestMethods($client->requests[0]));
    }

    public function testBatchRejectsEmptyPlans(): void
    {
        $api = self::zabbixApi([
            'url' => 'https://zabbix.example/api_jsonrpc.php',
            'token' => 'secret',
        ]);

        $this->expectException(ZabbixApiException::class);
        $this->expectExceptionMessage('Cannot send an empty Zabbix API batch.');

        $api->batch(static function (): void {});
    }

    public function testBatchValidatesQueuedParamsBeforeTransport(): void
    {
        $api = self::zabbixApi([
            'url' => 'https://zabbix.example/api_jsonrpc.php',
            'token' => 'secret',
        ], [], $client);

        $this->expectException(InvalidZabbixRequest::class);
        $this->expectExceptionMessage("Invalid params for 'host.get'");

        try {
            $api->batch(function ($batch): void {
                $batch->hosts->get(['output' => 123]);
            });
        } finally {
            self::assertSame([], $client->requests);
        }
    }

    public function testRequestConvertsJsonRpcErrorsToExceptions(): void
    {
        $api = self::zabbixApi([
            'url' => 'https://zabbix.example/api_jsonrpc.php',
            'token' => 'secret',
        ], [
            '[{"jsonrpc":"2.0","id":1,"result":"7.2.0"},{"jsonrpc":"2.0","id":2,"error":{"code":-32602,"message":"Invalid params","data":"bad input"}}]',
        ], $client);

        $this->expectException(ZabbixApiException::class);
        $this->expectExceptionCode(-32602);
        $this->expectExceptionMessage('Invalid params [bad input]');

        $api->hosts->get();
    }

    public function testConstructorRejectsUnknownOptions(): void
    {
        $this->expectException(RuntimeException::class);
        $this->expectExceptionMessage('Unknown Zabbix API option: "proxy".');

        self::zabbixApi([
            'url' => 'https://zabbix.example/api_jsonrpc.php',
            'token' => 'secret',
            'proxy' => 'http://proxy.example:8080',
        ]);
    }

    /**
     * @param array<string, mixed> $options
     * @param list<string>         $responses
     */
    private static function zabbixApi(
        array $options,
        array $responses = [],
        ?RecordingClient &$client = null,
    ): ZabbixApi {
        $client = new RecordingClient($responses);

        return new ZabbixApi($options + ['client' => $client]);
    }

    /**
     * @return array<string, mixed>|list<mixed>
     */
    private static function requestBody(RequestInterface $request): array
    {
        return json_decode((string)$request->getBody(), true, flags: JSON_THROW_ON_ERROR);
    }

    /**
     * @return list<string>
     */
    private static function requestMethods(RequestInterface $request): array
    {
        $body = self::requestBody($request);
        $requests = array_is_list($body) ? $body : [$body];

        return array_map(static fn (array $request): string => $request['method'], $requests);
    }
}
