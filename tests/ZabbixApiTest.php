<?php declare(strict_types=1);

namespace Tests;

use GuzzleHttp\Client as GuzzleClient;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Middleware;
use GuzzleHttp\Psr7\Response as HttpResponse;
use IntelliTrend\Zabbix\Requests\HostGetRequest;
use IntelliTrend\Zabbix\Requests\UserLoginRequest;
use IntelliTrend\Zabbix\ZabbixApi;
use IntelliTrend\Zabbix\ZabbixApiException;
use PHPUnit\Framework\TestCase;
use Psr\Log\AbstractLogger;

final class ZabbixApiTest extends TestCase
{
    public function testCanBeConstructedWithoutSupplyingHttpClient(): void
    {
        $api = new ZabbixApi();

        $this->expectException(ZabbixApiException::class);
        $this->expectExceptionCode(ZabbixApi::EXCEPTION_CLASS_CODE_AUTH);
        $this->expectExceptionMessage('Not connected to a Zabbix API endpoint');

        $api->call('host.get');
    }

    public function testConnectRejectsEmptyUrl(): void
    {
        $api = new ZabbixApi();

        $this->expectException(ZabbixApiException::class);
        $this->expectExceptionCode(ZabbixApi::EXCEPTION_CLASS_CODE);
        $this->expectExceptionMessage('Missing Zabbix URL.');

        $api->connect('', 'secret');
    }

    public function testConnectRejectsEmptyToken(): void
    {
        $api = new ZabbixApi();

        $this->expectException(ZabbixApiException::class);
        $this->expectExceptionCode(ZabbixApi::EXCEPTION_CLASS_CODE_AUTH);
        $this->expectExceptionMessage('Missing Zabbix API token.');

        $api->connect('https://zabbix.example', '');
    }

    public function testConnectReturnsConfiguredClientInstanceForSingletonFactories(): void
    {
        $history = [];
        $api = new ZabbixApi(httpClient: self::guzzle([
            new HttpResponse(200, [], '{"jsonrpc":"2.0","id":1,"result":"7.2.0"}'),
        ], $history));

        $configured = $api->connect(
            zabUrl: 'https://zabbix.example',
            zabToken: 'secret'
        );

        self::assertSame($api, $configured);
        self::assertSame('secret', $configured->getAuthToken());
        self::assertSame('7.2.0', $configured->getApiVersion());
    }

    public function testConnectChecksApiVersionWithoutBearerTokenAndCallsUseBearerToken(): void
    {
        $history = [];
        $api = new ZabbixApi(httpClient: self::guzzle([
            new HttpResponse(200, [], '{"jsonrpc":"2.0","id":1,"result":"7.2.0"}'),
            new HttpResponse(200, [], '{"jsonrpc":"2.0","id":1,"result":true}'),
        ], $history));

        $api->connect('https://zabbix.example', 'secret');

        self::assertTrue($api->call('host.get'));
        self::assertCount(2, $history);
        self::assertSame('', $history[0]['request']->getHeaderLine('Authorization'));
        self::assertSame('Bearer secret', $history[1]['request']->getHeaderLine('Authorization'));
    }

    public function testConnectCanConfigureEndpointBeforeUserLoginSuppliesBearerToken(): void
    {
        $history = [];
        $api = new ZabbixApi(httpClient: self::guzzle([
            new HttpResponse(200, [], '{"jsonrpc":"2.0","id":1,"result":"7.2.0"}'),
            new HttpResponse(200, [], '{"jsonrpc":"2.0","id":1,"result":"session-token"}'),
            new HttpResponse(200, [], '{"jsonrpc":"2.0","id":1,"result":true}'),
        ], $history));

        $api->connect('https://zabbix.example');

        self::assertSame('session-token', $api->request(new UserLoginRequest('Admin', 'zabbix')));
        self::assertSame('session-token', $api->getAuthToken());
        self::assertTrue($api->call('host.get'));

        self::assertCount(3, $history);
        self::assertSame('', $history[0]['request']->getHeaderLine('Authorization'));
        self::assertSame('', $history[1]['request']->getHeaderLine('Authorization'));
        self::assertSame('Bearer session-token', $history[2]['request']->getHeaderLine('Authorization'));
    }

    public function testUserLoginRequestIsSkippedWhenBearerTokenAlreadyExists(): void
    {
        $history = [];
        $api = new ZabbixApi(httpClient: self::guzzle([
            new HttpResponse(200, [], '{"jsonrpc":"2.0","id":1,"result":"7.2.0"}'),
        ], $history));

        $api->connect('https://zabbix.example', 'existing-token');

        self::assertSame('existing-token', $api->request(new UserLoginRequest('Admin', 'zabbix')));
        self::assertCount(1, $history);
    }

    public function testUserLoginRequestStoresSessionIdWhenUserDataIsReturned(): void
    {
        $history = [];
        $api = new ZabbixApi(httpClient: self::guzzle([
            new HttpResponse(200, [], '{"jsonrpc":"2.0","id":1,"result":"7.2.0"}'),
            new HttpResponse(200, [], '{"jsonrpc":"2.0","id":1,"result":{"userid":"1","sessionid":"session-token"}}'),
            new HttpResponse(200, [], '{"jsonrpc":"2.0","id":1,"result":true}'),
        ], $history));

        $api->connect('https://zabbix.example');

        self::assertSame(
            ['userid' => '1', 'sessionid' => 'session-token'],
            $api->request(new UserLoginRequest('Admin', 'zabbix', userData: true))
        );
        self::assertSame('session-token', $api->getAuthToken());
        self::assertTrue($api->call('host.get'));
        self::assertSame('Bearer session-token', $history[2]['request']->getHeaderLine('Authorization'));
    }

    public function testAuthenticatedCallsRequireUserLoginWhenConnectedWithoutBearerToken(): void
    {
        $history = [];
        $api = new ZabbixApi(httpClient: self::guzzle([
            new HttpResponse(200, [], '{"jsonrpc":"2.0","id":1,"result":"7.2.0"}'),
        ], $history));

        $api->connect('https://zabbix.example');

        $this->expectException(ZabbixApiException::class);
        $this->expectExceptionCode(ZabbixApi::EXCEPTION_CLASS_CODE_AUTH);
        $this->expectExceptionMessage('No Zabbix API bearer token configured');

        $api->call('host.get');
    }

    public function testCallSendsJsonRpc20RequestWithoutBodyAuth(): void
    {
        $history = [];
        $api = new ZabbixApi(httpClient: self::guzzle([
            new HttpResponse(200, [], '{"jsonrpc":"2.0","id":1,"result":"7.2.0"}'),
            new HttpResponse(200, [], '{"jsonrpc":"2.0","id":1,"result":[]}'),
        ], $history));

        $api->connect('https://zabbix.example/', 'secret');
        $api->call('host.get', ['output' => 'extend']);

        $body = json_decode((string)$history[1]['request']->getBody(), true, flags: JSON_THROW_ON_ERROR);

        self::assertSame([
            'jsonrpc' => '2.0',
            'method' => 'host.get',
            'id' => 1,
            'params' => ['output' => 'extend'],
        ], $body);
        self::assertArrayNotHasKey('auth', $body);
    }

    public function testCallDecodesJsonRpcResult(): void
    {
        $history = [];
        $api = new ZabbixApi(httpClient: self::guzzle([
            new HttpResponse(200, [], '{"jsonrpc":"2.0","id":1,"result":"7.2.0"}'),
            new HttpResponse(200, [], '{"jsonrpc":"2.0","id":1,"result":{"hostid":"10105"}}'),
        ], $history));

        $api->connect('https://zabbix.example', 'secret');

        self::assertSame(['hostid' => '10105'], $api->call('host.get'));
    }

    public function testRequestExecutesZabbixRequestObject(): void
    {
        $history = [];
        $api = new ZabbixApi(httpClient: self::guzzle([
            new HttpResponse(200, [], '{"jsonrpc":"2.0","id":1,"result":"7.2.0"}'),
            new HttpResponse(200, [], '{"jsonrpc":"2.0","id":1,"result":[{"hostid":"10105"}]}'),
        ], $history));

        $api->connect('https://zabbix.example', 'secret');

        self::assertSame(
            [['hostid' => '10105']],
            $api->request(HostGetRequest::fromParams(['output' => ['hostid']]))
        );

        self::assertSame([
            'jsonrpc' => '2.0',
            'method' => 'host.get',
            'id' => 1,
            'params' => ['output' => ['hostid']],
        ], json_decode((string)$history[1]['request']->getBody(), true, flags: JSON_THROW_ON_ERROR));
    }

    public function testDomainApiPropertiesBuildAndExecuteRequests(): void
    {
        $history = [];
        $api = new ZabbixApi(httpClient: self::guzzle([
            new HttpResponse(200, [], '{"jsonrpc":"2.0","id":1,"result":"7.2.0"}'),
            new HttpResponse(200, [], '{"jsonrpc":"2.0","id":1,"result":[{"hostid":"10105","host":"srv-01"}]}'),
        ], $history));

        $api->connect('https://zabbix.example', 'secret');

        self::assertSame(
            [['hostid' => '10105', 'host' => 'srv-01']],
            $api->hosts->get([
                'output' => ['hostid', 'host'],
                'filter' => ['host' => ['srv-01']],
            ])
        );

        self::assertSame([
            'jsonrpc' => '2.0',
            'method' => 'host.get',
            'id' => 1,
            'params' => [
                'output' => ['hostid', 'host'],
                'filter' => ['host' => ['srv-01']],
            ],
        ], json_decode((string)$history[1]['request']->getBody(), true, flags: JSON_THROW_ON_ERROR));
    }

    public function testRequestBuildersRemainAvailableForComposedRequests(): void
    {
        $api = new ZabbixApi();

        $request = $api
            ->requests()
            ->hosts
            ->get()
            ->filter(['host' => ['srv-01']])
            ->output(['hostid', 'host']);

        self::assertInstanceOf(HostGetRequest::class, $request);
        self::assertSame([
            'filter' => ['host' => ['srv-01']],
            'output' => ['hostid', 'host'],
        ], $request->params());
    }

    public function testCallConvertsJsonRpcErrorsToExceptions(): void
    {
        $history = [];
        $api = new ZabbixApi(httpClient: self::guzzle([
            new HttpResponse(200, [], '{"jsonrpc":"2.0","id":1,"result":"7.2.0"}'),
            new HttpResponse(200, [], '{"jsonrpc":"2.0","id":1,"error":{"code":-32602,"message":"Invalid params","data":"bad input"}}'),
        ], $history));

        $api->connect('https://zabbix.example', 'secret');

        $this->expectException(ZabbixApiException::class);
        $this->expectExceptionCode(-32602);
        $this->expectExceptionMessage('Invalid params [bad input]');

        $api->call('host.get');
    }

    public function testConnectAcceptsPlainGuzzleRequestOptions(): void
    {
        $history = [];
        $api = new ZabbixApi(
            options: [
                'verify' => false,
                'proxy' => 'http://proxy.example:8080',
            ],
            httpClient: self::guzzle([
                new HttpResponse(200, [], '{"jsonrpc":"2.0","id":1,"result":"7.2.0"}'),
            ], $history)
        );

        $api->connect('https://zabbix.example', 'secret');

        self::assertFalse($history[0]['options']['verify']);
        self::assertSame('http://proxy.example:8080', $history[0]['options']['proxy']);
        self::assertArrayNotHasKey('curl', $history[0]['options']);
    }

    public function testLoggerReceivesDebugContext(): void
    {
        $history = [];
        $logger = new ArrayLogger();
        $api = new ZabbixApi(
            httpClient: self::guzzle([
                new HttpResponse(200, [], '{"jsonrpc":"2.0","id":1,"result":"7.2.0"}'),
            ], $history),
            logger: $logger
        );

        $api->connect('https://zabbix.example', 'secret');

        self::assertSame([
            'Configured Zabbix HTTP client.',
            'Sending Zabbix JSON-RPC request.',
            'Received Zabbix JSON-RPC response.',
        ], array_column($logger->records, 'message'));
    }

    /**
     * @param list<HttpResponse> $responses
     * @param array<int, array<string, mixed>> $history
     */
    private static function guzzle(array $responses, array &$history): GuzzleClient
    {
        $stack = HandlerStack::create(new MockHandler($responses));
        $stack->push(Middleware::history($history));

        return new GuzzleClient(['handler' => $stack]);
    }
}

final class ArrayLogger extends AbstractLogger
{
    /** @var list<array{level: mixed, message: string, context: array<string, mixed>}> */
    public array $records = [];

    public function log($level, string|\Stringable $message, array $context = []): void
    {
        $this->records[] = [
            'level' => $level,
            'message' => (string)$message,
            'context' => $context,
        ];
    }
}
