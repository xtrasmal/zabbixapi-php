<?php declare(strict_types=1);

namespace Tests\Requests;

use IntelliTrend\Zabbix\Requests\HostGetRequest;
use IntelliTrend\Zabbix\Requests\InvalidZabbixRequest;
use IntelliTrend\Zabbix\Requests\RequestFactory;
use IntelliTrend\Zabbix\Requests\UnknownZabbixMethod;
use PHPUnit\Framework\TestCase;

final class RequestFactoryTest extends TestCase
{
    public function testPlainFactoryBuildsRequestFromMethodAndParams(): void
    {
        $request = RequestFactory::plain()->make('host.get', [
            'output' => ['hostid', 'host'],
            'filter' => ['host' => ['srv-01']],
        ]);

        self::assertInstanceOf(HostGetRequest::class, $request);
        self::assertSame('host.get', $request->method());
        self::assertSame([
            'output' => ['hostid', 'host'],
            'filter' => ['host' => ['srv-01']],
        ], $request->params());
    }

    public function testFactoryPreservesListRootParams(): void
    {
        $request = RequestFactory::plain()->make('host.delete', ['10105', '10106']);

        self::assertSame('host.delete', $request->method());
        self::assertSame(['10105', '10106'], $request->params());
    }

    public function testValidatedFactoryRejectsInvalidParams(): void
    {
        $this->expectException(InvalidZabbixRequest::class);

        RequestFactory::validated()->make('host.get', ['output' => 123]);
    }

    public function testPlainFactoryDoesNotValidateParams(): void
    {
        $request = RequestFactory::plain()->make('host.get', ['output' => 123]);

        self::assertSame(['output' => 123], $request->params());
    }

    public function testFactoryRejectsUnknownMethods(): void
    {
        $this->expectException(UnknownZabbixMethod::class);

        RequestFactory::plain()->make('unknown.method');
    }
}
