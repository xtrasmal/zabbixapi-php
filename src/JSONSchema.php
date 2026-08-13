<?php

declare(strict_types=1);

namespace Idiot\Zabbix;

/**
 * A Zabbix method's draft 2020-12 JSON Schema loaded from the bundled
 * versioned schema files.
 */
final class JSONSchema implements Schema
{
    /** @param array<string, mixed> $definition */
    public function __construct(
        private readonly string $method,
        private readonly array  $definition,
    ) {}

    public function method(): string
    {
        return $this->method;
    }

    public function paramsAreList(): bool
    {
        return 'array' === ($this->definition()['type'] ?? null);
    }

    /** @return array<string,mixed> */
    public function definition(): array
    {
        return $this->definition;
    }
}
