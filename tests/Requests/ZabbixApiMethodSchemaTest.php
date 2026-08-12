<?php declare(strict_types=1);

namespace Tests\Requests;

use IntelliTrend\Zabbix\Requests\AbstractZabbixListRequest;
use IntelliTrend\Zabbix\Requests\InvalidZabbixRequest;
use IntelliTrend\Zabbix\Requests\RequestSchema;
use IntelliTrend\Zabbix\Requests\StaticRequestRegistry;
use IntelliTrend\Zabbix\Requests\Schemas\StaticSchemaRegistry;
use IntelliTrend\Zabbix\Requests\UnknownZabbixMethod;
use IntelliTrend\Zabbix\Requests\ZabbixRequest;
use IntelliTrend\Zabbix\Requests\ZabbixRequestValidator;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;
use Tests\Support\SchemaSampleFactory;

final class ZabbixApiMethodSchemaTest extends TestCase
{
    private const UNSUPPORTED_SESSION_METHODS = ['user.logout'];

    /**
     * @param class-string<RequestSchema> $schemaClass
     * @param class-string<ZabbixRequest> $requestClass
     */
    #[DataProvider('apiMethods')]
    public function testRequestParamsValidateAgainstCompiledSchema(
        string $method,
        string $schemaClass,
        string $requestClass,
    ): void {
        $schema = new $schemaClass();
        $preferList = is_a($requestClass, AbstractZabbixListRequest::class, true);
        $params = SchemaSampleFactory::sample($schema->definition(), $preferList);
        $request = $requestClass::fromParams($params);

        self::assertSame($method, $request->method());
        self::assertSame($params, $request->params());

        ZabbixRequestValidator::createDefault()->validate($request);
        self::addToAssertionCount(1);
    }

    /**
     * @param class-string<RequestSchema> $schemaClass
     * @param class-string<ZabbixRequest> $requestClass
     */
    #[DataProvider('apiMethods')]
    public function testMalformedRequestParamsAreRejectedByCompiledSchema(
        string $method,
        string $schemaClass,
        string $requestClass,
    ): void {
        $schema = new $schemaClass();
        $preferList = is_a($requestClass, AbstractZabbixListRequest::class, true);
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

    public function testStaticRequestRegistryRejectsUnknownMethods(): void
    {
        $this->expectException(UnknownZabbixMethod::class);

        (new StaticRequestRegistry())->requestClassFor('unknown.method');
    }

    #[DataProvider('unsupportedSessionMethods')]
    public function testRuntimeRegistriesRejectSessionAuthenticationMethods(string $method): void
    {
        $this->expectException(UnknownZabbixMethod::class);

        (new StaticRequestRegistry())->requestClassFor($method);
    }

    #[DataProvider('unsupportedSessionMethods')]
    public function testSchemaRegistryRejectsSessionAuthenticationMethods(string $method): void
    {
        $this->expectException(UnknownZabbixMethod::class);

        (new StaticSchemaRegistry())->schemaFor($method);
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

    /** @return iterable<string, array{string, class-string<RequestSchema>, class-string<ZabbixRequest>}> */
    public static function apiMethods(): iterable
    {
        $requestRegistry = new StaticRequestRegistry();
        $schemaFiles = glob(__DIR__ . '/../../src/Requests/Schemas/*Schema.php');
        self::assertIsArray($schemaFiles);

        sort($schemaFiles);

        foreach ($schemaFiles as $schemaFile) {
            $schemaShortName = basename($schemaFile, '.php');
            if ($schemaShortName === 'StaticSchemaRegistry') {
                continue;
            }

            $schemaClass = 'IntelliTrend\\Zabbix\\Requests\\Schemas\\' . $schemaShortName;

            self::assertTrue(class_exists($schemaClass), sprintf('Schema class %s does not exist.', $schemaClass));
            self::assertTrue(is_subclass_of($schemaClass, RequestSchema::class));

            $method = (new $schemaClass())->definition()['title'] ?? null;
            self::assertIsString($method);
            if (in_array($method, self::UNSUPPORTED_SESSION_METHODS, true)) {
                continue;
            }

            $requestClass = $requestRegistry->requestClassFor($method);
            self::assertTrue(class_exists($requestClass), sprintf('Request class %s does not exist.', $requestClass));
            self::assertTrue(is_subclass_of($requestClass, ZabbixRequest::class));

            yield $method => [$method, $schemaClass, $requestClass];
        }
    }

    /** @return iterable<string, array{string, class-string<ZabbixRequest>}> */
    public static function sourceSpecMethods(): iterable
    {
        $requestRegistry = new StaticRequestRegistry();
        $schemaFiles = glob(__DIR__ . '/../../schemas/*/*.json');
        self::assertIsArray($schemaFiles);
        self::assertNotSame([], $schemaFiles, 'No source spec schemas found.');

        sort($schemaFiles);

        foreach ($schemaFiles as $schemaFile) {
            $schema = json_decode((string)file_get_contents($schemaFile), true, flags: JSON_THROW_ON_ERROR);
            $method = $schema['title'] ?? null;
            self::assertIsString($method);
            if (in_array($method, self::UNSUPPORTED_SESSION_METHODS, true)) {
                continue;
            }

            $requestClass = $requestRegistry->requestClassFor($method);

            yield $method => [$method, $requestClass];
        }
    }

    /** @return iterable<string, array{string}> */
    public static function unsupportedSessionMethods(): iterable
    {
        foreach (self::UNSUPPORTED_SESSION_METHODS as $method) {
            yield $method => [$method];
        }
    }
}
