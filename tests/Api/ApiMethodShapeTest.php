<?php

declare(strict_types=1);

namespace Tests\Api;

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
        $apiFiles = glob(__DIR__ . '/../../src/Api/*Api.php');
        self::assertIsArray($apiFiles);

        foreach ($apiFiles as $apiFile) {
            $shortName = basename($apiFile, '.php');
            if (in_array($shortName, ['AbstractApi', 'ZabbixApiGroup', 'ZabbixBatch', 'ZabbixBatchGroup'], true)) {
                continue;
            }

            $class = 'Idiot\\Zabbix\\Api\\' . $shortName;
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
