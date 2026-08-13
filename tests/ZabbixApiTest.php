<?php

declare(strict_types=1);

namespace Tests;

use GuzzleHttp\Client as GuzzleClient;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Middleware;
use GuzzleHttp\Psr7\Response as HttpResponse;
use Idiot\Zabbix\Clients\HttpClient;
use Idiot\Zabbix\Clients\JsonRpcClient;
use Idiot\Zabbix\InvalidZabbixRequest;
use Idiot\Zabbix\Requests\HostGetRequest;
use Idiot\Zabbix\ZabbixApi;
use Idiot\Zabbix\ZabbixApiException;
use Idiot\Zabbix\ZabbixApiOptions;
use PHPUnit\Framework\TestCase;
use Psr\Log\AbstractLogger;
use Psr\Log\LoggerInterface;
use RuntimeException;

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

    public function testConstructorCanConfigureEndpointTokenAndClientOptions(): void
    {
        $history = [];
        $api = self::zabbixApi([
            'url' => 'https://zabbix.example/api_jsonrpc.php',
            'token' => 'secret',
            'verify' => false,
        ], [
            new HttpResponse(200, [], '[{"jsonrpc":"2.0","id":1,"result":"7.2.0"},{"jsonrpc":"2.0","id":2,"result":[{"hostid":"10105"}]}]'),
        ], $history);

        self::assertSame([], $history);
        self::assertSame([['hostid' => '10105']], $api->hosts->get(['output' => ['hostid']]));

        self::assertCount(1, $history);
        self::assertSame('https://zabbix.example/api_jsonrpc.php', (string)$history[0]['request']->getUri());
        self::assertSame('https://zabbix.example/api_jsonrpc.php', (string)$history[0]['options']['base_uri']);
        self::assertFalse($history[0]['options']['http_errors']);
        self::assertFalse($history[0]['options']['verify']);
        self::assertSame('Bearer secret', $history[0]['request']->getHeaderLine('Authorization'));
        self::assertSame(['apiinfo.version', 'host.get'], self::requestMethods($history[0]));
    }

    public function testDebugEnablesGuzzleHttpErrors(): void
    {
        $history = [];
        $api = self::zabbixApi([
            'url' => 'https://zabbix.example/api_jsonrpc.php',
            'token' => 'secret',
            'debug' => true,
        ], [
            new HttpResponse(200, [], '{"jsonrpc":"2.0","id":1,"result":"7.2.0"}'),
        ], $history, ['http_errors' => true]);

        self::assertSame('7.2.0', $api->getApiVersion());
        self::assertTrue($history[0]['options']['http_errors']);
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
        $history = [];
        $api = self::zabbixApi([
            'url' => 'https://zabbix.example/api_jsonrpc.php',
            'token' => 'secret',
        ], [
            new HttpResponse(200, [], '[{"jsonrpc":"2.0","id":1,"result":"7.2.0"},{"jsonrpc":"2.0","id":2,"result":[]}]'),
        ], $history);

        $api->hosts->get(['output' => 'extend']);

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

    public function testRequestValidationStopsTransport(): void
    {
        $history = [];
        $api = self::zabbixApi([
            'url' => 'https://zabbix.example/api_jsonrpc.php',
            'token' => 'secret',
        ], [], $history);

        $this->expectException(InvalidZabbixRequest::class);
        $this->expectExceptionMessage("Invalid params for 'host.get'");

        try {
            $api->hosts->get(['output' => 123]);
        } finally {
            self::assertSame([], $history);
        }
    }

    public function testRequestDecodesJsonRpcResult(): void
    {
        $history = [];
        $api = self::zabbixApi([
            'url' => 'https://zabbix.example/api_jsonrpc.php',
            'token' => 'secret',
        ], [
            new HttpResponse(200, [], '[{"jsonrpc":"2.0","id":1,"result":"7.2.0"},{"jsonrpc":"2.0","id":2,"result":{"hostid":"10105"}}]'),
        ], $history);

        self::assertSame(['hostid' => '10105'], $api->request(HostGetRequest::fromParams([])));
    }

    public function testRequestExecutesZabbixRequestObject(): void
    {
        $history = [];
        $api = self::zabbixApi([
            'url' => 'https://zabbix.example/api_jsonrpc.php',
            'token' => 'secret',
        ], [
            new HttpResponse(200, [], '[{"jsonrpc":"2.0","id":1,"result":"7.2.0"},{"jsonrpc":"2.0","id":2,"result":[{"hostid":"10105"}]}]'),
        ], $history);

        self::assertSame(
            [['hostid' => '10105']],
            $api->request(HostGetRequest::fromParams(['output' => ['hostid']])),
        );

        self::assertSame(['apiinfo.version', 'host.get'], self::requestMethods($history[0]));
    }

    public function testDomainApiPropertiesBuildAndExecuteRequests(): void
    {
        $history = [];
        $api = self::zabbixApi([
            'url' => 'https://zabbix.example/api_jsonrpc.php',
            'token' => 'secret',
        ], [
            new HttpResponse(200, [], '[{"jsonrpc":"2.0","id":1,"result":"7.2.0"},{"jsonrpc":"2.0","id":2,"result":[{"hostid":"10105","host":"srv-01"}]}]'),
        ], $history);

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

    public function testDomainApiPropertiesValidateParamsBeforeTransport(): void
    {
        $history = [];
        $api = self::zabbixApi([
            'url' => 'https://zabbix.example/api_jsonrpc.php',
            'token' => 'secret',
        ], [], $history);

        $this->expectException(InvalidZabbixRequest::class);
        $this->expectExceptionMessage("Invalid params for 'host.get'");

        try {
            $api->hosts->get(['output' => 123]);
        } finally {
            self::assertSame([], $history);
        }
    }

    public function testPublicApiGroupsAcceptPlainArrayParams(): void
    {
        $history = [];
        $api = self::zabbixApi([
            'url' => 'https://zabbix.example/api_jsonrpc.php',
            'token' => 'secret',
        ], [
            new HttpResponse(200, [], '[{"jsonrpc":"2.0","id":1,"result":"7.2.0"},{"jsonrpc":"2.0","id":2,"result":{"groupids":["17"]}}]'),
            new HttpResponse(200, [], '{"jsonrpc":"2.0","id":1,"result":[{"templateid":"10001"}]}'),
            new HttpResponse(200, [], '{"jsonrpc":"2.0","id":1,"result":[{"itemid":"30001"}]}'),
        ], $history);

        self::assertSame(['groupids' => ['17']], $api->hostGroups->create(['name' => 'Linux servers']));
        self::assertSame([['templateid' => '10001']], $api->templates->get([
            'filter' => ['host' => ['Template OS Linux']],
            'output' => ['templateid'],
        ]));
        self::assertSame([['itemid' => '30001']], $api->items->get([
            'hostids' => ['10105'],
            'output' => ['itemid'],
        ]));

        $firstBody = json_decode((string)$history[0]['request']->getBody(), true, flags: JSON_THROW_ON_ERROR);
        $secondBody = json_decode((string)$history[1]['request']->getBody(), true, flags: JSON_THROW_ON_ERROR);
        $thirdBody = json_decode((string)$history[2]['request']->getBody(), true, flags: JSON_THROW_ON_ERROR);

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
        $history = [];
        $api = self::zabbixApi([
            'url' => 'https://zabbix.example/api_jsonrpc.php',
            'token' => 'secret',
        ], [
            new HttpResponse(200, [], '[{"jsonrpc":"2.0","id":1,"result":"7.2.0"},{"jsonrpc":"2.0","id":2,"result":true}]'),
        ], $history);

        self::assertTrue($api->users->logout());

        $body = json_decode((string)$history[0]['request']->getBody(), true, flags: JSON_THROW_ON_ERROR);

        self::assertSame('Bearer secret', $history[0]['request']->getHeaderLine('Authorization'));
        self::assertSame('user.logout', $body[1]['method']);
        self::assertSame([], $body[1]['params']);
    }

    public function testApiVersionLookupIsLazyAndCached(): void
    {
        $history = [];
        $api = self::zabbixApi([
            'url' => 'https://zabbix.example/api_jsonrpc.php',
            'token' => 'secret',
        ], [
            new HttpResponse(200, [], '{"jsonrpc":"2.0","id":1,"result":"7.2.0"}'),
        ], $history);

        self::assertSame([], $history);
        self::assertSame('7.2.0', $api->getApiVersion());
        self::assertSame('7.2.0', $api->getApiVersion());

        self::assertCount(1, $history);
        self::assertSame('Bearer secret', $history[0]['request']->getHeaderLine('Authorization'));
        self::assertSame('apiinfo.version', json_decode((string)$history[0]['request']->getBody(), true, flags: JSON_THROW_ON_ERROR)['method']);
    }

    public function testBatchQueuesGroupedCallsAndReturnsResultsInOrder(): void
    {
        $history = [];
        $api = self::zabbixApi([
            'url' => 'https://zabbix.example/api_jsonrpc.php',
            'token' => 'secret',
        ], [
            new HttpResponse(200, [], '[{"jsonrpc":"2.0","id":1,"result":"7.2.0"},{"jsonrpc":"2.0","id":2,"result":[{"hostid":"10105"}]},{"jsonrpc":"2.0","id":3,"result":[{"itemid":"30001"}]}]'),
        ], $history);

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

        $body = json_decode((string)$history[0]['request']->getBody(), true, flags: JSON_THROW_ON_ERROR);

        self::assertSame('Bearer secret', $history[0]['request']->getHeaderLine('Authorization'));
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
        $history = [];
        $api = self::zabbixApi([
            'url' => 'https://zabbix.example/api_jsonrpc.php',
            'token' => 'secret',
        ], [
            new HttpResponse(200, [], '[{"jsonrpc":"2.0","id":1,"result":"7.2.0"},{"jsonrpc":"2.0","id":2,"result":[{"hostid":"10105"}]}]'),
        ], $history);

        $results = $api->batch(fn ($batch) => $batch->hosts->get(['output' => ['hostid']]));

        self::assertSame([[['hostid' => '10105']]], $results);
        self::assertSame(['apiinfo.version', 'host.get'], self::requestMethods($history[0]));
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
        $history = [];
        $api = self::zabbixApi([
            'url' => 'https://zabbix.example/api_jsonrpc.php',
            'token' => 'secret',
        ], [], $history);

        $this->expectException(InvalidZabbixRequest::class);
        $this->expectExceptionMessage("Invalid params for 'host.get'");

        try {
            $api->batch(function ($batch): void {
                $batch->hosts->get(['output' => 123]);
            });
        } finally {
            self::assertSame([], $history);
        }
    }

    public function testRequestConvertsJsonRpcErrorsToExceptions(): void
    {
        $history = [];
        $api = self::zabbixApi([
            'url' => 'https://zabbix.example/api_jsonrpc.php',
            'token' => 'secret',
        ], [
            new HttpResponse(200, [], '[{"jsonrpc":"2.0","id":1,"result":"7.2.0"},{"jsonrpc":"2.0","id":2,"error":{"code":-32602,"message":"Invalid params","data":"bad input"}}]'),
        ], $history);

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

    public function testLoggerReceivesDebugContext(): void
    {
        $history = [];
        $logger = new ArrayLogger();
        $api = self::zabbixApi([
            'url' => 'https://zabbix.example/api_jsonrpc.php',
            'token' => 'secret',
            'logger' => $logger,
        ], [
            new HttpResponse(200, [], '{"jsonrpc":"2.0","id":1,"result":"7.2.0"}'),
        ], $history, logger: $logger);

        self::assertSame('7.2.0', $api->getApiVersion());
        self::assertSame([
            'Configured Zabbix HTTP client.',
            'Sending Zabbix JSON-RPC request.',
            'Received Zabbix JSON-RPC response.',
        ], array_column($logger->records, 'message'));
    }

    /**
     * @param array<string, mixed>             $options
     * @param list<HttpResponse>               $responses
     * @param array<int, array<string, mixed>> $history
     * @param array<string, mixed>             $clientOptions
     */
    private static function zabbixApi(
        array $options,
        array $responses = [],
        ?array &$history = null,
        array $clientOptions = [],
        ?LoggerInterface $logger = null,
    ): ZabbixApi {
        $api = new ZabbixApi($options);

        if (null !== $history) {
            self::replaceJsonRpcClient(
                $api,
                self::jsonRpcClient(
                    $responses,
                    $history,
                    self::resolvedClientOptions($options, $clientOptions),
                    $logger ?? (isset($options['logger']) && $options['logger'] instanceof LoggerInterface ? $options['logger'] : null),
                ),
            );
        }

        return $api;
    }

    private static function replaceJsonRpcClient(ZabbixApi $api, JsonRpcClient $client): void
    {
        $property = new \ReflectionProperty(ZabbixApi::class, 'options');
        $options = $property->getValue($api);

        if (!$options instanceof ZabbixApiOptions) {
            throw new \LogicException('ZabbixApi options property must contain resolved options.');
        }

        $replaceClient = \Closure::bind(
            static fn (ZabbixApiOptions $options, JsonRpcClient $client): ZabbixApiOptions => new ZabbixApiOptions(
                url: $options->url,
                token: $options->token,
                debug: $options->debug,
                verify: $options->verify,
                timeout: $options->timeout,
                connectTimeout: $options->connectTimeout,
                logger: $options->logger,
                client: $client,
            ),
            null,
            ZabbixApiOptions::class,
        );

        $property->setValue($api, $replaceClient($options, $client));
    }

    /**
     * @param list<HttpResponse>               $responses
     * @param array<int, array<string, mixed>> $history
     * @param array<string, mixed>             $options
     */
    private static function jsonRpcClient(
        array $responses,
        array &$history,
        array $options = [],
        ?LoggerInterface $logger = null,
    ): JsonRpcClient {
        return new JsonRpcClient(new HttpClient(self::guzzle($responses, $history, $options)), $logger);
    }

    /**
     * @param list<HttpResponse>               $responses
     * @param array<int, array<string, mixed>> $history
     * @param array<string, mixed>             $options
     */
    private static function guzzle(array $responses, array &$history, array $options = []): GuzzleClient
    {
        $stack = HandlerStack::create(new MockHandler($responses));
        $stack->push(Middleware::history($history));

        return new GuzzleClient(array_replace_recursive($options, ['handler' => $stack]));
    }

    /**
     * @param array<string, mixed> $apiOptions
     * @param array<string, mixed> $overrides
     *
     * @return array<string, mixed>
     */
    private static function resolvedClientOptions(array $apiOptions, array $overrides): array
    {
        return array_replace_recursive([
            'base_uri' => $apiOptions['url'],
            'connect_timeout' => $apiOptions['connect_timeout'] ?? ZabbixApiOptions::DEFAULT_CONNECTION_TIMEOUT,
            'headers' => [
                'Authorization' => 'Bearer ' . $apiOptions['token'],
                'Content-Type' => 'application/json-rpc',
                'User-Agent' => 'Idiot/ZabbixApi;Version:' . ZabbixApi::VERSION,
            ],
            'http_errors' => $apiOptions['debug'] ?? false,
            'timeout' => $apiOptions['timeout'] ?? ZabbixApiOptions::DEFAULT_TIMEOUT,
            'verify' => $apiOptions['verify'] ?? true,
        ], $overrides);
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
