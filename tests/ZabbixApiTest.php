<?php

declare(strict_types=1);

namespace Tests;

use GuzzleHttp\Client as GuzzleClient;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Middleware;
use GuzzleHttp\Psr7\Response as HttpResponse;
use Idiot\Zabbix\Requests\HostGetRequest;
use Idiot\Zabbix\ZabbixApi;
use Idiot\Zabbix\ZabbixApiException;
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

    public function testConstructorRejectsEmptyUrl(): void
    {
        $this->expectException(ZabbixApiException::class);
        $this->expectExceptionCode(ZabbixApi::EXCEPTION_CLASS_CODE);
        $this->expectExceptionMessage('Missing Zabbix URL.');

        new ZabbixApi(options: [
            'url' => '',
            'token' => 'secret',
        ]);
    }

    public function testConstructorRejectsEmptyToken(): void
    {
        $this->expectException(ZabbixApiException::class);
        $this->expectExceptionCode(ZabbixApi::EXCEPTION_CLASS_CODE_AUTH);
        $this->expectExceptionMessage('Missing Zabbix API token.');

        new ZabbixApi(options: [
            'url' => 'https://zabbix.example',
            'token' => '',
        ]);
    }

    public function testConstructorCanConfigureEndpointTokenAndHttpOptions(): void
    {
        $history = [];
        $api = new ZabbixApi(
            options: [
                'url' => 'https://zabbix.example',
                'token' => 'secret',
                'verify' => false,
            ],
            httpClient: self::guzzle([
                new HttpResponse(200, [], '[{"jsonrpc":"2.0","id":1,"result":"7.2.0"},{"jsonrpc":"2.0","id":2,"result":[{"hostid":"10105"}]}]'),
            ], $history),
        );

        self::assertSame('secret', $api->getAuthToken());
        self::assertSame([], $history);
        self::assertSame([['hostid' => '10105']], $api->hosts->get(['output' => ['hostid']]));

        self::assertCount(1, $history);
        self::assertFalse($history[0]['options']['verify']);
        self::assertSame('Bearer secret', $history[0]['request']->getHeaderLine('Authorization'));
        self::assertSame(['apiinfo.version', 'host.get'], self::requestMethods($history[0]));
    }

    public function testConstructorRejectsTokenWithoutEndpoint(): void
    {
        $this->expectException(ZabbixApiException::class);
        $this->expectExceptionCode(ZabbixApi::EXCEPTION_CLASS_CODE_AUTH);
        $this->expectExceptionMessage('Zabbix API token cannot be configured without a Zabbix URL.');

        new ZabbixApi(options: [
            'token' => 'secret',
        ]);
    }

    public function testConstructorCanConfigureUserLoginForFirstAuthenticatedCall(): void
    {
        $history = [];
        $api = new ZabbixApi(
            options: [
                'url' => 'https://zabbix.example',
                'username' => 'Admin',
                'password' => 'zabbix',
            ],
            httpClient: self::guzzle([
                new HttpResponse(200, [], '[{"jsonrpc":"2.0","id":1,"result":"7.2.0"},{"jsonrpc":"2.0","id":2,"result":"session-token"}]'),
                new HttpResponse(200, [], '{"jsonrpc":"2.0","id":1,"result":[{"hostid":"10105"}]}'),
            ], $history),
        );

        self::assertSame([['hostid' => '10105']], $api->hosts->get(['output' => ['hostid']]));
        self::assertSame('session-token', $api->getAuthToken());
        self::assertCount(2, $history);

        self::assertSame('', $history[0]['request']->getHeaderLine('Authorization'));
        self::assertSame('Bearer session-token', $history[1]['request']->getHeaderLine('Authorization'));

        self::assertSame(
            'user.login',
            self::requestMethods($history[0])[1],
        );
    }

    public function testConstructorSkipsConfiguredUserLoginWhenTokenExists(): void
    {
        $history = [];
        $api = new ZabbixApi(
            options: [
                'url' => 'https://zabbix.example',
                'token' => 'secret',
                'username' => 'Admin',
                'password' => 'zabbix',
            ],
            httpClient: self::guzzle([
                new HttpResponse(200, [], '[{"jsonrpc":"2.0","id":1,"result":"7.2.0"},{"jsonrpc":"2.0","id":2,"result":[{"hostid":"10105"}]}]'),
            ], $history),
        );

        self::assertSame([['hostid' => '10105']], $api->hosts->get(['output' => ['hostid']]));
        self::assertCount(1, $history);
        self::assertSame(['apiinfo.version', 'host.get'], self::requestMethods($history[0]));
        self::assertSame('Bearer secret', $history[0]['request']->getHeaderLine('Authorization'));
    }

    public function testConstructorRejectsPartialUserLoginOptions(): void
    {
        $this->expectException(ZabbixApiException::class);
        $this->expectExceptionCode(ZabbixApi::EXCEPTION_CLASS_CODE_AUTH);
        $this->expectExceptionMessage('Zabbix API username and password must be configured together.');

        new ZabbixApi(options: [
            'url' => 'https://zabbix.example',
            'username' => 'Admin',
        ]);
    }

    public function testAuthenticatedCallsRequireBearerTokenOrConfiguredLogin(): void
    {
        $history = [];
        $api = new ZabbixApi(
            options: [
                'url' => 'https://zabbix.example',
            ],
            httpClient: self::guzzle([
            ], $history),
        );

        $this->expectException(ZabbixApiException::class);
        $this->expectExceptionCode(ZabbixApi::EXCEPTION_CLASS_CODE_AUTH);
        $this->expectExceptionMessage('No Zabbix API bearer token configured');

        $api->call('host.get');
    }

    public function testCallSendsJsonRpc20RequestWithoutBodyAuth(): void
    {
        $history = [];
        $api = new ZabbixApi(
            options: [
                'url' => 'https://zabbix.example/',
                'token' => 'secret',
            ],
            httpClient: self::guzzle([
                new HttpResponse(200, [], '[{"jsonrpc":"2.0","id":1,"result":"7.2.0"},{"jsonrpc":"2.0","id":2,"result":[]}]'),
            ], $history),
        );

        $api->call('host.get', ['output' => 'extend']);

        $body = json_decode((string)$history[0]['request']->getBody(), true, flags: JSON_THROW_ON_ERROR);

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

    public function testCallDecodesJsonRpcResult(): void
    {
        $history = [];
        $api = new ZabbixApi(
            options: [
                'url' => 'https://zabbix.example',
                'token' => 'secret',
            ],
            httpClient: self::guzzle([
                new HttpResponse(200, [], '[{"jsonrpc":"2.0","id":1,"result":"7.2.0"},{"jsonrpc":"2.0","id":2,"result":{"hostid":"10105"}}]'),
            ], $history),
        );

        self::assertSame(['hostid' => '10105'], $api->call('host.get'));
    }

    public function testRequestExecutesZabbixRequestObject(): void
    {
        $history = [];
        $api = new ZabbixApi(
            options: [
                'url' => 'https://zabbix.example',
                'token' => 'secret',
            ],
            httpClient: self::guzzle([
                new HttpResponse(200, [], '[{"jsonrpc":"2.0","id":1,"result":"7.2.0"},{"jsonrpc":"2.0","id":2,"result":[{"hostid":"10105"}]}]'),
            ], $history),
        );

        self::assertSame(
            [['hostid' => '10105']],
            $api->request(HostGetRequest::fromParams(['output' => ['hostid']])),
        );

        self::assertSame(['apiinfo.version', 'host.get'], self::requestMethods($history[0]));
    }

    public function testDomainApiPropertiesBuildAndExecuteRequests(): void
    {
        $history = [];
        $api = new ZabbixApi(
            options: [
                'url' => 'https://zabbix.example',
                'token' => 'secret',
            ],
            httpClient: self::guzzle([
                new HttpResponse(200, [], '[{"jsonrpc":"2.0","id":1,"result":"7.2.0"},{"jsonrpc":"2.0","id":2,"result":[{"hostid":"10105","host":"srv-01"}]}]'),
            ], $history),
        );

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
        ], json_decode((string)$history[0]['request']->getBody(), true, flags: JSON_THROW_ON_ERROR)[1]);
    }

    public function testApiVersionLookupIsLazyUnauthenticatedAndCached(): void
    {
        $history = [];
        $api = new ZabbixApi(
            options: [
                'url' => 'https://zabbix.example',
                'token' => 'secret',
            ],
            httpClient: self::guzzle([
                new HttpResponse(200, [], '{"jsonrpc":"2.0","id":1,"result":"7.2.0"}'),
            ], $history),
        );

        self::assertSame([], $history);
        self::assertSame('7.2.0', $api->getApiVersion());
        self::assertSame('7.2.0', $api->getApiVersion());

        self::assertCount(1, $history);
        self::assertSame('', $history[0]['request']->getHeaderLine('Authorization'));
        self::assertSame('apiinfo.version', json_decode((string)$history[0]['request']->getBody(), true, flags: JSON_THROW_ON_ERROR)['method']);
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
        $api = new ZabbixApi(
            options: [
                'url' => 'https://zabbix.example',
                'token' => 'secret',
            ],
            httpClient: self::guzzle([
                new HttpResponse(200, [], '[{"jsonrpc":"2.0","id":1,"result":"7.2.0"},{"jsonrpc":"2.0","id":2,"error":{"code":-32602,"message":"Invalid params","data":"bad input"}}]'),
            ], $history),
        );

        $this->expectException(ZabbixApiException::class);
        $this->expectExceptionCode(-32602);
        $this->expectExceptionMessage('Invalid params [bad input]');

        $api->call('host.get');
    }

    public function testConstructorAcceptsPlainGuzzleRequestOptions(): void
    {
        $history = [];
        $api = new ZabbixApi(
            options: [
                'url' => 'https://zabbix.example',
                'token' => 'secret',
                'verify' => false,
                'proxy' => 'http://proxy.example:8080',
            ],
            httpClient: self::guzzle([
                new HttpResponse(200, [], '{"jsonrpc":"2.0","id":1,"result":"7.2.0"}'),
            ], $history),
        );

        self::assertSame('7.2.0', $api->getApiVersion());
        self::assertFalse($history[0]['options']['verify']);
        self::assertSame('http://proxy.example:8080', $history[0]['options']['proxy']);
        self::assertArrayNotHasKey('curl', $history[0]['options']);
    }

    public function testLoggerReceivesDebugContext(): void
    {
        $history = [];
        $logger = new ArrayLogger();
        $api = new ZabbixApi(
            options: [
                'url' => 'https://zabbix.example',
                'token' => 'secret',
            ],
            httpClient: self::guzzle([
                new HttpResponse(200, [], '{"jsonrpc":"2.0","id":1,"result":"7.2.0"}'),
            ], $history),
            logger: $logger,
        );

        self::assertSame('7.2.0', $api->getApiVersion());
        self::assertSame([
            'Configured Zabbix HTTP client.',
            'Sending Zabbix JSON-RPC request.',
            'Received Zabbix JSON-RPC response.',
        ], array_column($logger->records, 'message'));
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

    /**
     * @param array<string, mixed> $history
     *
     * @return list<string>
     */
    private static function requestMethods(array $history): array
    {
        $body = json_decode((string)$history['request']->getBody(), true, flags: JSON_THROW_ON_ERROR);
        $requests = array_is_list($body) ? $body : [$body];

        return array_map(static fn (array $request): string => $request['method'], $requests);
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
