<?php declare(strict_types=1);

namespace Tests\Api;

use IntelliTrend\Zabbix\Api\ZabbixRequestApi;
use IntelliTrend\Zabbix\Requests\Enums\Output;
use IntelliTrend\Zabbix\Requests\HostGetRequest;
use IntelliTrend\Zabbix\Requests\SettingsGetRequest;
use PHPUnit\Framework\TestCase;

final class ZabbixRequestApiTest extends TestCase
{
    public function testGroupPropertiesAndMethodsReturnTheSameApiWrapper(): void
    {
        $api = new ZabbixRequestApi();

        self::assertSame($api->hosts, $api->hosts());
        self::assertSame($api->hostGroups, $api->hostGroups());
        self::assertSame($api->templates, $api->templates());
    }

    public function testFilteredHostRequestComposesWithOutput(): void
    {
        $request = (new ZabbixRequestApi())
            ->hosts
            ->filter(['host' => ['srv-01', 'srv-22']])
            ->output(['hostid', 'host']);

        self::assertInstanceOf(HostGetRequest::class, $request);
        self::assertSame('host.get', $request->method());
        self::assertSame([
            'filter' => [
                'host' => ['srv-01', 'srv-22'],
            ],
            'output' => ['hostid', 'host'],
        ], $request->params());
    }

    public function testFilteredHostRequestDoesNotForceALimitOrOutput(): void
    {
        $request = (new ZabbixRequestApi())->hosts->filter(['host' => ['srv-01']]);

        self::assertSame([
            'filter' => [
                'host' => ['srv-01'],
            ],
        ], $request->params());
    }

    public function testGetRequestOutputAcceptsZabbixOutputEnum(): void
    {
        $request = (new ZabbixRequestApi())->settings->get()->output(Output::Extend);

        self::assertInstanceOf(SettingsGetRequest::class, $request);
        self::assertSame(['output' => 'extend'], $request->params());
    }

    public function testObjectRequestsExposeSharedFluentParams(): void
    {
        $api = new ZabbixRequestApi();

        self::assertTrue(method_exists($api->hosts->get(), 'filter'));
        self::assertTrue(method_exists($api->settings->get(), 'filter'));
        self::assertSame([
            'filter' => ['host' => ['srv-01']],
            'output' => ['hostid'],
        ], $api->hosts->get()->filter(['host' => ['srv-01']])->output(['hostid'])->params());
    }

    public function testUserFacadeExposesOfficialLoginButNotLogout(): void
    {
        $api = new ZabbixRequestApi();

        self::assertTrue(method_exists($api->users, 'login'));
        self::assertFalse(method_exists($api->users, 'logout'));
    }
}
