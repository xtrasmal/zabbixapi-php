<?php

declare(strict_types=1);

namespace Tests\Support;

/**
 * Builds minimal JSON data-model samples from the compiled Zabbix request
 * schemas. The samples are intentionally plain arrays/scalars because the
 * request layer owns arrays only; serialization stays outside this package.
 */
final class SchemaSampleFactory
{
    /** @param array<string, mixed> $schema */
    public static function sample(array $schema, bool $preferList = false): array
    {
        $value = self::valueFor($schema, $schema, $preferList);

        if (!is_array($value)) {
            throw new \LogicException('Root schema sample must be an array.');
        }

        return $value;
    }

    /** @param array<string, mixed> $schema */
    public static function invalidSample(array $schema, bool $preferList = false): array
    {
        return [null];
    }

    /**
     * @param array<string, mixed> $schema
     * @param array<string, mixed> $root
     */
    private static function valueFor(array $schema, array $root, bool $preferList = false): mixed
    {
        $schema = self::resolveRef($schema, $root);

        if (array_key_exists('enum', $schema)) {
            return $schema['enum'][0];
        }

        if (array_key_exists('const', $schema)) {
            return $schema['const'];
        }

        foreach (['oneOf', 'anyOf'] as $keyword) {
            if (
                isset($schema[$keyword])
                && is_array($schema[$keyword])
                && !isset($schema['type'])
                && !isset($schema['properties'])
                && !isset($schema['required'])
                && !isset($schema['items'])
            ) {
                $branch = self::chooseBranch($schema[$keyword], $root, $preferList);

                return self::valueFor($branch, $root, $preferList);
            }
        }

        if (isset($schema['allOf']) && is_array($schema['allOf'])) {
            $merged = $schema;
            unset($merged['allOf']);

            foreach ($schema['allOf'] as $branch) {
                if (is_array($branch)) {
                    $merged = self::mergeSchema($merged, self::resolveRef($branch, $root));
                }
            }

            return self::valueFor($merged, $root, $preferList);
        }

        $type = $schema['type'] ?? self::inferType($schema);
        if (is_array($type)) {
            $type = self::preferredType($type, $preferList);
        }

        return match ($type) {
            'object' => self::objectFor($schema, $root),
            'array' => self::arrayFor($schema, $root, $preferList),
            'integer' => self::integerFor($schema),
            'number' => self::numberFor($schema),
            'boolean' => true,
            'null' => null,
            default => self::stringFor($schema),
        };
    }

    /**
     * @param list<array<string, mixed>> $branches
     * @param array<string, mixed>       $root
     *
     * @return array<string, mixed>
     */
    private static function chooseBranch(array $branches, array $root, bool $preferList): array
    {
        if ($preferList) {
            foreach ($branches as $branch) {
                $resolved = self::resolveRef($branch, $root);
                $type = $resolved['type'] ?? self::inferType($resolved);

                if ('array' === $type || (is_array($type) && in_array('array', $type, true))) {
                    return $branch;
                }
            }
        }

        return $branches[0];
    }

    /**
     * @param array<string, mixed> $schema
     * @param array<string, mixed> $root
     *
     * @return array<string, mixed>
     */
    private static function resolveRef(array $schema, array $root): array
    {
        if (!isset($schema['$ref'])) {
            return $schema;
        }

        $ref = $schema['$ref'];
        if (!is_string($ref) || !str_starts_with($ref, '#/')) {
            throw new \LogicException(sprintf('Unsupported schema reference: %s', (string)$ref));
        }

        $current = $root;
        foreach (explode('/', substr($ref, 2)) as $segment) {
            $segment = str_replace(['~1', '~0'], ['/', '~'], $segment);

            if (!is_array($current) || !array_key_exists($segment, $current)) {
                throw new \LogicException(sprintf('Unknown schema reference: %s', $ref));
            }

            $current = $current[$segment];
        }

        if (!is_array($current)) {
            throw new \LogicException(sprintf('Schema reference does not point to a schema: %s', $ref));
        }

        return self::mergeSchema($current, array_diff_key($schema, ['$ref' => true]));
    }

    /**
     * @param array<string, mixed> $schema
     * @param array<string, mixed> $root
     *
     * @return array<string, mixed>
     */
    private static function objectFor(array $schema, array $root): array
    {
        $properties = $schema['properties'] ?? [];
        $required = $schema['required'] ?? [];
        foreach (['oneOf', 'anyOf'] as $keyword) {
            if (isset($schema[$keyword]) && is_array($schema[$keyword])) {
                $branch = self::resolveRef(self::chooseBranch($schema[$keyword], $root, false), $root);

                if (isset($branch['required']) && is_array($branch['required'])) {
                    $required = array_values(array_unique(array_merge($required, $branch['required'])));
                }

                if (isset($branch['properties']) && is_array($branch['properties'])) {
                    $properties = array_replace($properties, $branch['properties']);
                }
            }
        }

        $object = [];

        foreach ($required as $name) {
            if (!is_string($name)) {
                continue;
            }

            $object[$name] = isset($properties[$name]) && is_array($properties[$name])
                ? self::valueFor($properties[$name], $root)
                : '1';
        }

        if ([] === $object && isset($schema['minProperties']) && is_int($schema['minProperties']) && $schema['minProperties'] > 0) {
            foreach ($properties as $name => $propertySchema) {
                if (is_string($name) && is_array($propertySchema)) {
                    $object[$name] = self::valueFor($propertySchema, $root);

                    break;
                }
            }
        }

        return $object;
    }

    /**
     * @param array<string, mixed> $schema
     * @param array<string, mixed> $root
     */
    private static function arrayFor(array $schema, array $root, bool $preferList): array
    {
        $itemCount = $schema['minItems'] ?? 0;
        if (!is_int($itemCount)) {
            $itemCount = 0;
        }

        if ($preferList && ($schema['maxItems'] ?? null) !== 0) {
            $itemCount = max(1, $itemCount);
        }

        $items = [];
        $itemSchema = $schema['items'] ?? [];
        for ($i = 0; $i < $itemCount; $i++) {
            $items[] = is_array($itemSchema)
                ? self::valueFor($itemSchema, $root)
                : '1';
        }

        return $items;
    }

    /** @param array<string, mixed> $schema */
    private static function integerFor(array $schema): int
    {
        if (isset($schema['minimum']) && is_int($schema['minimum'])) {
            return $schema['minimum'];
        }

        return 1;
    }

    /** @param array<string, mixed> $schema */
    private static function numberFor(array $schema): int|float
    {
        if (isset($schema['minimum']) && (is_int($schema['minimum']) || is_float($schema['minimum']))) {
            return $schema['minimum'];
        }

        return 1;
    }

    /** @param array<string, mixed> $schema */
    private static function stringFor(array $schema): string
    {
        if (isset($schema['format']) && 'uri' === $schema['format']) {
            return 'https://example.com';
        }

        return '1';
    }

    /** @param array<string, mixed> $schema */
    private static function inferType(array $schema): string
    {
        if (isset($schema['properties']) || isset($schema['required'])) {
            return 'object';
        }

        if (isset($schema['items'])) {
            return 'array';
        }

        return 'string';
    }

    /** @param list<string> $types */
    private static function preferredType(array $types, bool $preferList): string
    {
        if ($preferList && in_array('array', $types, true)) {
            return 'array';
        }

        foreach (['object', 'string', 'integer', 'number', 'boolean', 'array'] as $type) {
            if (in_array($type, $types, true)) {
                return $type;
            }
        }

        return $types[0];
    }

    /**
     * @param array<string, mixed> $base
     * @param array<string, mixed> $overlay
     *
     * @return array<string, mixed>
     */
    private static function mergeSchema(array $base, array $overlay): array
    {
        foreach ($overlay as $key => $value) {
            if ('required' === $key && isset($base[$key]) && is_array($base[$key]) && is_array($value)) {
                $base[$key] = array_values(array_unique(array_merge($base[$key], $value)));

                continue;
            }

            if ('properties' === $key && isset($base[$key]) && is_array($base[$key]) && is_array($value)) {
                $base[$key] = array_replace($base[$key], $value);

                continue;
            }

            $base[$key] = $value;
        }

        return $base;
    }
}
