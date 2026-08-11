<?php declare(strict_types=1);

namespace Tests\Requests;

use IntelliTrend\Zabbix\Requests\AbstractZabbixListRequest;
use IntelliTrend\Zabbix\Requests\InvalidZabbixRequest;
use IntelliTrend\Zabbix\Requests\RequestSchema;
use IntelliTrend\Zabbix\Requests\ZabbixRequest;
use IntelliTrend\Zabbix\Requests\ZabbixRequestValidator;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;
use Tests\Support\SchemaSampleFactory;

final class ZabbixApiMethodSchemaTest extends TestCase
{
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

    /** @return iterable<string, array{string, class-string<RequestSchema>, class-string<ZabbixRequest>}> */
    public static function apiMethods(): iterable
    {
        $schemaFiles = glob(__DIR__ . '/../../src/Requests/Schemas/*Schema.php');
        self::assertIsArray($schemaFiles);

        sort($schemaFiles);

        foreach ($schemaFiles as $schemaFile) {
            $schemaShortName = basename($schemaFile, '.php');
            if ($schemaShortName === 'StaticSchemaRegistry') {
                continue;
            }

            $requestShortName = substr($schemaShortName, 0, -6) . 'Request';
            $schemaClass = 'IntelliTrend\\Zabbix\\Requests\\Schemas\\' . $schemaShortName;
            $requestClass = 'IntelliTrend\\Zabbix\\Requests\\' . $requestShortName;

            self::assertTrue(class_exists($schemaClass), sprintf('Schema class %s does not exist.', $schemaClass));
            self::assertTrue(class_exists($requestClass), sprintf('Request class %s does not exist.', $requestClass));
            self::assertTrue(is_subclass_of($schemaClass, RequestSchema::class));
            self::assertTrue(is_subclass_of($requestClass, ZabbixRequest::class));

            $method = (new $schemaClass())->definition()['title'] ?? null;
            self::assertIsString($method);

            yield $method => [$method, $schemaClass, $requestClass];
        }
    }
}
