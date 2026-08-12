<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Requests;

/**
 * A draft 2020-12 JSON Schema, compiled from the fleet doc-spec into a PHP
 * array literal at build time. No JSON is read at runtime.
 */
abstract class RequestSchema
{
    public function paramsAreList(): bool
    {
        return 'array' === ($this->definition()['type'] ?? null);
    }

    /** @return array<string,mixed> */
    abstract public function definition(): array;
}
