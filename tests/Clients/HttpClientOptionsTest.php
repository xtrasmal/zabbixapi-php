<?php declare(strict_types=1);

namespace Tests\Clients;

use IntelliTrend\Zabbix\Clients\HttpClient;
use IntelliTrend\Zabbix\ZabbixApi;
use PHPUnit\Framework\TestCase;

final class HttpClientOptionsTest extends TestCase
{
    public function testDefaultOptionsUseGuzzleRequestOptionKeys(): void
    {
        $options = HttpClient::defaultOptions();

        self::assertSame(ZabbixApi::DEFAULT_TIMEOUT, $options['timeout']);
        self::assertSame(ZabbixApi::DEFAULT_CONNECTION_TIMEOUT, $options['connect_timeout']);
        self::assertTrue($options['verify']);
        self::assertArrayNotHasKey('curl', $options);
    }

    public function testMergeOptionsOverridesDefaultsWithGuzzleStyleOptions(): void
    {
        $options = HttpClient::mergeOptions([
            'timeout' => 45,
            'connect_timeout' => 12,
            'verify' => false,
            'proxy' => 'http://proxy.example:8080',
        ]);

        self::assertSame(45, $options['timeout']);
        self::assertSame(12, $options['connect_timeout']);
        self::assertFalse($options['verify']);
        self::assertSame('http://proxy.example:8080', $options['proxy']);
        self::assertArrayNotHasKey('curl', $options);
    }

    public function testConfigureStoresMergedGuzzleOptions(): void
    {
        $client = new HttpClient();

        $client->configure([
            'verify' => false,
            'proxy' => 'http://proxy.example:8080',
        ]);

        self::assertFalse($client->options()['verify']);
        self::assertSame('http://proxy.example:8080', $client->options()['proxy']);
        self::assertSame(ZabbixApi::DEFAULT_TIMEOUT, $client->options()['timeout']);
    }

}
