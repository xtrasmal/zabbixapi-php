<?php

declare(strict_types=1);

namespace Tests\Api;

use Idiot\Zabbix\Registry;
use Idiot\Zabbix\Request;
use PHPUnit\Framework\TestCase;
use ReflectionClass;
use ReflectionException;
use ReflectionMethod;
use ReflectionNamedType;
use ReflectionParameter;
use ReflectionUnionType;

final class ApiMethodShapeTest extends TestCase
{
    /**
     * @throws ReflectionException
     */
    public function testGeneratedApiMethodsAcceptPlainArrayParams(): void
    {
        foreach (self::generatedApiClasses() as $class) {
            self::assertTrue(class_exists($class), sprintf('API class %s does not exist.', $class));

            $reflection = new ReflectionClass($class);
            foreach ($reflection->getMethods(ReflectionMethod::IS_PUBLIC) as $method) {
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

    /**
     * @throws ReflectionException
     */
    public function testGeneratedApiMethodsBuildRegisteredRequests(): void
    {
        $registry = new Registry();

        foreach (self::generatedApiClasses() as $class) {
            $api = new $class();
            $reflection = new ReflectionClass($class);

            foreach ($reflection->getMethods(ReflectionMethod::IS_PUBLIC) as $method) {
                if ($method->getDeclaringClass()->getName() !== $class) {
                    continue;
                }

                $request = $method->invoke($api, []);
                self::assertInstanceOf(Request::class, $request);
                self::assertSame($registry->requestClassFor($request), $request::class);
            }
        }
    }

    /**
     * @return list<class-string>
     */
    private static function generatedApiClasses(): array
    {
        $apiFiles = glob(__DIR__ . '/../../src/Api/*Api.php');
        self::assertIsArray($apiFiles);

        $classes = [];
        foreach ($apiFiles as $apiFile) {
            $shortName = basename($apiFile, '.php');
            if (in_array($shortName, ['AbstractApi', 'ZabbixApiGroup', 'ZabbixBatch', 'ZabbixBatchGroup'], true)) {
                continue;
            }

            $classes[] = 'Idiot\\Zabbix\\Api\\' . $shortName;
        }

        return $classes;
    }

    private static function parameterAcceptsArray(ReflectionParameter $parameter): bool
    {
        $type = $parameter->getType();

        if ($type instanceof ReflectionNamedType) {
            return 'array' === $type->getName();
        }

        if ($type instanceof ReflectionUnionType) {
            foreach ($type->getTypes() as $unionType) {
                if ('array' === $unionType->getName()) {
                    return true;
                }
            }
        }

        return false;
    }
}
