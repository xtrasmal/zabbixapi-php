<?php

declare(strict_types=1);

namespace Tests\Requests;

use Idiot\Zabbix\InvalidZabbixRequest;
use Idiot\Zabbix\JSONSchemaProvider;
use Idiot\Zabbix\Registry;
use Idiot\Zabbix\Requests\AbstractRequest;
use Idiot\Zabbix\Requests\HistoryPushRequest;
use Idiot\Zabbix\Requests\HostDeleteRequest;
use Idiot\Zabbix\Requests\HostGetRequest;
use Idiot\Zabbix\Requests\UserLogoutRequest;
use Idiot\Zabbix\Request;
use Idiot\Zabbix\UnknownZabbixMethod;
use Idiot\Zabbix\ZabbixRequestValidator;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;
use Tests\Support\SchemaSampleFactory;

final class ZabbixApiMethodSchemaTest extends TestCase
{
    /**
     * @param class-string<Request> $requestClass
     */
    #[DataProvider('apiMethods')]
    public function testRequestParamsValidateAgainstBundledSchema(
        string $method,
        string $schemaFile,
        string $requestClass,
    ): void {
        $request = $requestClass::fromParams([]);
        $schema = (new JSONSchemaProvider())->schemaFor($request);
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
     * @param class-string<Request> $requestClass
     */
    #[DataProvider('apiMethods')]
    public function testMalformedRequestParamsAreRejectedByBundledSchema(
        string $method,
        string $schemaFile,
        string $requestClass,
    ): void {
        $request = $requestClass::fromParams([]);
        $schema = (new JSONSchemaProvider())->schemaFor($request);
        self::assertSame(self::schemaDefinition($schemaFile), $schema->definition());

        $preferList = self::paramsAreList($requestClass);
        $params = SchemaSampleFactory::invalidSample($schema->definition(), $preferList);
        $request = $requestClass::fromParams($params);

        self::assertSame($method, $request->method());
        self::expectException(InvalidZabbixRequest::class);

        ZabbixRequestValidator::createDefault()->validate($request);
    }

    public function testRequestRegistryPullsClassesFromRequests(): void
    {
        $request = HostGetRequest::fromParams([
            'output' => ['hostid', 'host'],
            'filter' => ['host' => ['srv-01']],
        ]);
        $registry = new Registry();

        self::assertTrue($registry->has($request));
        self::assertSame(HostGetRequest::class, $registry->requestClassFor($request));
    }

    public function testRequestRegistryCanBePopulatedWithRequestClasses(): void
    {
        $registry = new Registry();
        $registry->register(CustomRegistryRequest::class);
        $request = CustomRegistryRequest::fromParams([]);

        self::assertTrue($registry->has($request));
        self::assertSame(CustomRegistryRequest::class, $registry->requestClassFor($request));
    }

    public function testRequestRegistrySupportsUserLogoutAsOfficialZabbixMethod(): void
    {
        $request = UserLogoutRequest::fromParams([]);
        $registry = new Registry();

        self::assertTrue($registry->has($request));
        self::assertSame(UserLogoutRequest::class, $registry->requestClassFor($request));

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
            if (!is_subclass_of($class, AbstractRequest::class)) {
                continue;
            }

            $constructor = (new \ReflectionClass($class))->getConstructor();

            self::assertNotNull($constructor, sprintf('%s must inherit the base params constructor.', $class));
            self::assertSame(
                AbstractRequest::class,
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
        $schema = (new JSONSchemaProvider())->schemaFor(HostGetRequest::fromParams([]));

        self::assertSame('host.get', $schema->method());
        self::assertSame('host.get', $schema->definition()['title'] ?? null);
        self::assertSame('https://zabbix.com/7.0/api/host/host.get', $schema->definition()['$id'] ?? null);
        self::assertFalse($schema->paramsAreList());
    }

    public function testRequestRegistryRejectsUnknownRequests(): void
    {
        $this->expectException(UnknownZabbixMethod::class);

        (new Registry())->requestClassFor(new class implements Request {
            public function method(): string
            {
                return 'unknown.method';
            }

            public function params(): array
            {
                return [];
            }
        });
    }

    /**
     * @param class-string<Request> $requestClass
     */
    #[DataProvider('sourceSpecMethods')]
    public function testRequestRegistryCoversSourceSpecMethods(string $method, string $requestClass): void
    {
        $registry = new Registry();
        $request = $requestClass::fromParams([]);

        self::assertContains($method, $registry->methods());
        self::assertSame($requestClass, $registry->requestClassFor($request));
    }

    public function testGeneratedPhpSchemaClassesAreNotRuntimeApi(): void
    {
        $schemaFiles = glob(__DIR__ . '/../../src/Requests/Schemas/*Schema.php');

        self::assertSame([], false === $schemaFiles ? [] : $schemaFiles);
    }

    /** @return iterable<string, array{string, string, class-string<Request>}> */
    public static function apiMethods(): iterable
    {
        $requestRegistry = new Registry();
        $requestClasses = $requestRegistry->requestClasses();

        foreach (self::schemaFiles() as $schemaFile) {
            $method = self::schemaDefinition($schemaFile)['title'] ?? null;
            self::assertIsString($method);
            self::assertArrayHasKey($method, $requestClasses);
            $requestClass = $requestClasses[$method];
            self::assertTrue(class_exists($requestClass), sprintf('Request class %s does not exist.', $requestClass));
            self::assertTrue(is_subclass_of($requestClass, Request::class));

            yield $method => [$method, $schemaFile, $requestClass];
        }
    }

    /** @return iterable<string, array{string, class-string<Request>}> */
    public static function sourceSpecMethods(): iterable
    {
        $requestRegistry = new Registry();
        $requestClasses = $requestRegistry->requestClasses();

        foreach (self::schemaFiles() as $schemaFile) {
            $schema = self::schemaDefinition($schemaFile);
            $method = $schema['title'] ?? null;
            self::assertIsString($method);
            self::assertArrayHasKey($method, $requestClasses);
            $requestClass = $requestClasses[$method];

            yield $method => [$method, $requestClass];
        }
    }

    /** @param class-string<Request> $requestClass */
    private static function paramsAreList(string $requestClass): bool
    {
        if (!is_a($requestClass, AbstractRequest::class, true)) {
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

final class CustomRegistryRequest extends AbstractRequest
{
    public function method(): string
    {
        return 'custom.test';
    }
}
