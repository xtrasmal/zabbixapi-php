<?php

declare(strict_types=1);

namespace Tests\Clients;

use GuzzleHttp\Client as GuzzleClient;
use GuzzleHttp\Exception\InvalidArgumentException as GuzzleInvalidArgumentException;
use GuzzleHttp\Exception\ServerException;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Middleware;
use GuzzleHttp\Psr7\Response as HttpResponse;
use Idiot\Zabbix\Clients\HttpClient;
use JsonException;
use PHPUnit\Framework\TestCase;

final class HttpClientTest extends TestCase
{
    public function testPostJsonUsesConfiguredTransport(): void
    {
        $history = [];
        $client = new HttpClient(
            self::guzzle(
                [new HttpResponse(200, [], '{"jsonrpc":"2.0","id":1,"result":true}')],
                $history,
                [
                    'base_uri' => 'https://zabbix.example/api_jsonrpc.php',
                    'decode_content' => false,
                    'headers' => [
                        'Authorization' => 'Bearer secret',
                        'Content-Type' => 'application/json-rpc',
                    ],
                    'verify' => false,
                ],
            ),
        );

        $response = $client->postJson(['jsonrpc' => '2.0', 'method' => 'host.get', 'id' => 1, 'params' => []]);

        self::assertSame(['jsonrpc' => '2.0', 'id' => 1, 'result' => true], $response);
        self::assertCount(1, $history);
        self::assertSame('POST', $history[0]['request']->getMethod());
        self::assertSame('https://zabbix.example/api_jsonrpc.php', (string)$history[0]['request']->getUri());
        self::assertSame('application/json', $history[0]['request']->getHeaderLine('Content-Type'));
        self::assertSame('Bearer secret', $history[0]['request']->getHeaderLine('Authorization'));
        self::assertSame('{"jsonrpc":"2.0","method":"host.get","id":1,"params":[]}', (string)$history[0]['request']->getBody());
        self::assertFalse($history[0]['options']['verify']);
        self::assertFalse($history[0]['options']['decode_content']);
        self::assertArrayNotHasKey('curl', $history[0]['options']);
    }

    public function testPostJsonLetsGuzzleHandleHttpErrors(): void
    {
        $history = [];
        $client = new HttpClient(
            self::guzzle(
                [new HttpResponse(500, [], 'server exploded')],
                $history,
            ),
        );

        $this->expectException(ServerException::class);

        $client->postJson([]);
    }

    public function testPostJsonLetsJsonDecodeReportInvalidResponses(): void
    {
        $history = [];
        $client = new HttpClient(self::guzzle([
            new HttpResponse(200, [], '{"jsonrpc":"2.0","method":"foobar'),
        ], $history));

        $this->expectException(JsonException::class);

        $client->postJson([]);
    }

    public function testPostJsonLetsGuzzleReportInvalidRequestPayloads(): void
    {
        $history = [];
        $client = new HttpClient(self::guzzle([], $history));

        $this->expectException(GuzzleInvalidArgumentException::class);

        $client->postJson(['jsonrpc' => '2.0', 'method' => 'host.get', 'id' => 1, 'params' => [NAN]]);
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

        return new GuzzleClient($options + ['handler' => $stack]);
    }
}
