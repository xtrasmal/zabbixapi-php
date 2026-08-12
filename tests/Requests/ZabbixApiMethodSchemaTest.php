<?php

declare(strict_types=1);

namespace Tests\Requests;

use Idiot\Zabbix\Requests\AbstractZabbixRequest;
use Idiot\Zabbix\Requests\HistoryPushRequest;
use Idiot\Zabbix\Requests\HostDeleteRequest;
use Idiot\Zabbix\Requests\HostGetRequest;
use Idiot\Zabbix\Requests\InvalidZabbixRequest;
use Idiot\Zabbix\Requests\JsonFileSchemaProvider;
use Idiot\Zabbix\Requests\StaticRequestRegistry;
use Idiot\Zabbix\Requests\UnknownZabbixMethod;
use Idiot\Zabbix\Requests\UserLogoutRequest;
use Idiot\Zabbix\Requests\ZabbixRequest;
use Idiot\Zabbix\Requests\ZabbixRequestValidator;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;
use Tests\Support\SchemaSampleFactory;

final class ZabbixApiMethodSchemaTest extends TestCase
{
    /**
     * @param class-string<ZabbixRequest> $requestClass
     */
    #[DataProvider('apiMethods')]
    public function testRequestParamsValidateAgainstBundledSchema(
        string $method,
        string $schemaFile,
        string $requestClass,
    ): void {
        $schema = (new JsonFileSchemaProvider())->schemaFor($method);
        self::assertSame(self::schemaDefinition($schemaFile), $schema->definition());

        $preferList = self::paramsAreList($requestClass);
        $params = SchemaSampleFactory::sample($schema->definition(), $preferList);
        $request = $requestClass::fromParams($params);

        self::assertSame($method, $request->method());
        self::assertSame($params, $request->params());

        ZabbixRequestValidator::createDefault()->validate($request);
        self::addToAssertionCount(1);
    }

    /**
     * @param class-string<ZabbixRequest> $requestClass
     */
    #[DataProvider('apiMethods')]
    public function testMalformedRequestParamsAreRejectedByBundledSchema(
        string $method,
        string $schemaFile,
        string $requestClass,
    ): void {
        $schema = (new JsonFileSchemaProvider())->schemaFor($method);
        self::assertSame(self::schemaDefinition($schemaFile), $schema->definition());

        $preferList = self::paramsAreList($requestClass);
        $params = SchemaSampleFactory::invalidSample($schema->definition(), $preferList);
        $request = $requestClass::fromParams($params);

        self::assertSame($method, $request->method());
        self::expectException(InvalidZabbixRequest::class);

        ZabbixRequestValidator::createDefault()->validate($request);
    }

    public function testStaticRequestRegistryBuildsRequestsFromMethodAndParams(): void
    {
        $request = (new StaticRequestRegistry())->requestFor('host.get', [
            'output' => ['hostid', 'host'],
            'filter' => ['host' => ['srv-01']],
        ]);

        self::assertSame('host.get', $request->method());
        self::assertSame([
            'output' => ['hostid', 'host'],
            'filter' => ['host' => ['srv-01']],
        ], $request->params());
    }

    public function testStaticRequestRegistryBuildsListRootRequestsFromMethodAndParams(): void
    {
        $request = (new StaticRequestRegistry())->requestFor('host.delete', ['10105', '10106']);

        self::assertSame('host.delete', $request->method());
        self::assertSame(['10105', '10106'], $request->params());
    }

    public function testStaticRequestRegistrySupportsUserLoginAsOfficialZabbixMethod(): void
    {
        $request = (new StaticRequestRegistry())->requestFor('user.login', [
            'username' => 'api-user',
            'password' => 'secret',
        ]);

        self::assertSame('user.login', $request->method());
        self::assertSame([
            'username' => 'api-user',
            'password' => 'secret',
        ], $request->params());
    }

    public function testStaticRequestRegistrySupportsUserLogoutAsOfficialZabbixMethod(): void
    {
        $request = (new StaticRequestRegistry())->requestFor('user.logout');

        self::assertInstanceOf(UserLogoutRequest::class, $request);
        self::assertSame('user.logout', $request->method());
        self::assertSame([], $request->params());

        ZabbixRequestValidator::createDefault()->validate($request);
    }

    public function testGeneratedRequestsDoNotExposePublicConstructors(): void
    {
        $requestFiles = glob(__DIR__ . '/../../src/Requests/*Request.php');
        self::assertIsArray($requestFiles);

        foreach ($requestFiles as $requestFile) {
            $shortName = basename($requestFile, '.php');
            if ('ZabbixRequest' === $shortName) {
                continue;
            }

            $class = 'Idiot\\Zabbix\\Requests\\' . $shortName;

            self::assertTrue(class_exists($class), sprintf('Request class %s does not exist.', $class));
            if (!is_subclass_of($class, AbstractZabbixRequest::class)) {
                continue;
            }

            $constructor = (new \ReflectionClass($class))->getConstructor();

            self::assertNotNull($constructor, sprintf('%s must inherit the base params constructor.', $class));
            self::assertSame(
                AbstractZabbixRequest::class,
                $constructor->getDeclaringClass()->getName(),
                sprintf('%s must not declare its own constructor.', $class),
            );
            self::assertFalse($constructor->isPublic(), sprintf('%s constructor must not be public API.', $class));
        }
    }

    public function testRequestRootShapeComesFromSchema(): void
    {
        self::assertFalse(HostGetRequest::fromParams([])->paramsAreList());
        self::assertTrue(HostDeleteRequest::fromParams(['10105'])->paramsAreList());
        self::assertFalse(HistoryPushRequest::fromParams([
            'host' => 'srv-01',
            'key' => 'trap.value',
            'value' => 17,
        ])->paramsAreList());
    }

    public function testJsonFileSchemaProviderLoadsBundledZabbixSevenSchemas(): void
    {
        $schema = (new JsonFileSchemaProvider())->schemaFor('host.get');

        self::assertSame('host.get', $schema->method());
        self::assertSame('host.get', $schema->definition()['title'] ?? null);
        self::assertSame('https://zabbix.com/7.0/api/host/host.get', $schema->definition()['$id'] ?? null);
        self::assertFalse($schema->paramsAreList());
    }

    public function testStaticRequestRegistryRejectsUnknownMethods(): void
    {
        $this->expectException(UnknownZabbixMethod::class);

        (new StaticRequestRegistry())->requestClassFor('unknown.method');
    }

    /**
     * @param class-string<ZabbixRequest> $requestClass
     */
    #[DataProvider('sourceSpecMethods')]
    public function testStaticRequestRegistryCoversSourceSpecMethods(string $method, string $requestClass): void
    {
        $registry = new StaticRequestRegistry();

        self::assertContains($method, $registry->methods());
        self::assertSame($requestClass, $registry->requestClassFor($method));
    }

    public function testGeneratedPhpSchemaClassesAreNotRuntimeApi(): void
    {
        $schemaFiles = glob(__DIR__ . '/../../src/Requests/Schemas/*Schema.php');

        self::assertSame([], false === $schemaFiles ? [] : $schemaFiles);
    }

    /** @return iterable<string, array{string, string, class-string<ZabbixRequest>}> */
    public static function apiMethods(): iterable
    {
        $requestRegistry = new StaticRequestRegistry();
        foreach (self::schemaFiles() as $schemaFile) {
            $method = self::schemaDefinition($schemaFile)['title'] ?? null;
            self::assertIsString($method);
            $requestClass = $requestRegistry->requestClassFor($method);
            self::assertTrue(class_exists($requestClass), sprintf('Request class %s does not exist.', $requestClass));
            self::assertTrue(is_subclass_of($requestClass, ZabbixRequest::class));

            yield $method => [$method, $schemaFile, $requestClass];
        }
    }

    /** @return iterable<string, array{string, class-string<ZabbixRequest>}> */
    public static function sourceSpecMethods(): iterable
    {
        $requestRegistry = new StaticRequestRegistry();
        foreach (self::schemaFiles() as $schemaFile) {
            $schema = self::schemaDefinition($schemaFile);
            $method = $schema['title'] ?? null;
            self::assertIsString($method);
            $requestClass = $requestRegistry->requestClassFor($method);

            yield $method => [$method, $requestClass];
        }
    }

    /** @param class-string<ZabbixRequest> $requestClass */
    private static function paramsAreList(string $requestClass): bool
    {
        if (!is_a($requestClass, AbstractZabbixRequest::class, true)) {
            return false;
        }

        return $requestClass::fromParams([])->paramsAreList();
    }

    /** @return list<string> */
    private static function schemaFiles(): array
    {
        $schemaFiles = glob(__DIR__ . '/../../schemas/7.0/*/*.json');
        self::assertIsArray($schemaFiles);
        self::assertNotSame([], $schemaFiles, 'No bundled Zabbix 7.0 schemas found.');

        sort($schemaFiles);

        return $schemaFiles;
    }

    /** @return array<string, mixed> */
    private static function schemaDefinition(string $schemaFile): array
    {
        $schema = json_decode((string)file_get_contents($schemaFile), true, flags: JSON_THROW_ON_ERROR);
        self::assertIsArray($schema);

        /** @var array<string, mixed> $schema */
        return $schema;
    }
}
