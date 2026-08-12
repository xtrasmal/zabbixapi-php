<?php declare(strict_types=1);

namespace Tests\Clients;

use GuzzleHttp\Client as GuzzleClient;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Middleware;
use GuzzleHttp\Psr7\Response as HttpResponse;
use IntelliTrend\Zabbix\Clients\HttpClient;
use IntelliTrend\Zabbix\ZabbixApiException;
use PHPUnit\Framework\TestCase;

final class HttpClientTest extends TestCase
{
    public function testPostJsonRpcUsesBearerTokenTransport(): void
    {
        $history = [];
        $client = new HttpClient(
            self::guzzle([
                new HttpResponse(200, [], '{"jsonrpc":"2.0","id":1,"result":true}'),
            ], $history),
            [
                'decode_content' => false,
                'verify' => false,
            ]
        );

        $response = $client->postJsonRpc(
            'https://zabbix.example/api_jsonrpc.php',
            '{"jsonrpc":"2.0","method":"host.get","id":1}',
            bearerToken: 'secret'
        );

        self::assertSame(['jsonrpc' => '2.0', 'id' => 1, 'result' => true], $response);
        self::assertCount(1, $history);
        self::assertSame('POST', $history[0]['request']->getMethod());
        self::assertSame('https://zabbix.example/api_jsonrpc.php', (string)$history[0]['request']->getUri());
        self::assertSame('application/json-rpc', $history[0]['request']->getHeaderLine('Content-Type'));
        self::assertSame('Bearer secret', $history[0]['request']->getHeaderLine('Authorization'));
        self::assertSame('{"jsonrpc":"2.0","method":"host.get","id":1}', (string)$history[0]['request']->getBody());
        self::assertFalse($history[0]['options']['verify']);
        self::assertFalse($history[0]['options']['decode_content']);
        self::assertArrayNotHasKey('curl', $history[0]['options']);
    }

    public function testPostJsonRpcConvertsHttpErrorsToZabbixApiExceptions(): void
    {
        $history = [];
        $client = new HttpClient(self::guzzle([
            new HttpResponse(500, [], 'server exploded'),
        ], $history));

        $this->expectException(ZabbixApiException::class);
        $this->expectExceptionCode(500);
        $this->expectExceptionMessage('Request failed with HTTP-Code: 500.');

        $client->postJsonRpc(
            'https://zabbix.example/api_jsonrpc.php',
            '{}'
        );
    }

    public function testPostJsonRpcConvertsInvalidJsonResponsesToZabbixApiExceptions(): void
    {
        $history = [];
        $client = new HttpClient(self::guzzle([
            new HttpResponse(200, [], '{"jsonrpc":"2.0","method":"foobar'),
        ], $history));

        $this->expectException(ZabbixApiException::class);
        $this->expectExceptionMessage('Invalid JSON response:');

        $client->postJsonRpc(
            'https://zabbix.example/api_jsonrpc.php',
            '{}'
        );
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
