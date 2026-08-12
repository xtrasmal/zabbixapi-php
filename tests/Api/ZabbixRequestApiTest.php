<?php

declare(strict_types=1);

namespace Tests\Api;

use Idiot\Zabbix\Api\ZabbixRequestApi;
use Idiot\Zabbix\Requests\Enums\Output;
use Idiot\Zabbix\Requests\SettingsGetRequest;
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

    public function testRequestBuilderMethodsAcceptPlainArrayParams(): void
    {
        $apiFiles = glob(__DIR__ . '/../../src/Api/*Api.php');
        self::assertIsArray($apiFiles);

        foreach ($apiFiles as $apiFile) {
            $shortName = basename($apiFile, '.php');
            if (in_array($shortName, ['AbstractApi', 'ZabbixRequestApi'], true)) {
                continue;
            }

            $class = 'Idiot\\Zabbix\\Api\\' . $shortName;
            self::assertTrue(class_exists($class), sprintf('API class %s does not exist.', $class));

            $reflection = new \ReflectionClass($class);
            foreach ($reflection->getMethods(\ReflectionMethod::IS_PUBLIC) as $method) {
                if ($method->getDeclaringClass()->getName() !== $class) {
                    continue;
                }

                $parameter = $method->getParameters()[0] ?? null;
                self::assertNotNull($parameter, sprintf('%s::%s() must accept array params.', $class, $method->getName()));
                self::assertTrue(
                    self::parameterAcceptsArray($parameter),
                    sprintf('%s::%s() must accept array params.', $class, $method->getName()),
                );
            }
        }
    }

    private static function parameterAcceptsArray(\ReflectionParameter $parameter): bool
    {
        $type = $parameter->getType();

        if ($type instanceof \ReflectionNamedType) {
            return 'array' === $type->getName();
        }

        if ($type instanceof \ReflectionUnionType) {
            foreach ($type->getTypes() as $unionType) {
                if ('array' === $unionType->getName()) {
                    return true;
                }
            }
        }

        return false;
    }
}
