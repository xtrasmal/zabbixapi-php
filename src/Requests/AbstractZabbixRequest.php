<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Requests;

use BackedEnum;
use Idiot\Zabbix\JsonFileSchemaProvider;

/**
 * Base for generated Zabbix requests. Requests are method-specific envelopes
 * around the plain Zabbix params array; the schema provider owns the method
 * shape and validation rules.
 */
abstract class AbstractZabbixRequest implements ZabbixRequest
{
    /** @var array<string, mixed>|list<mixed>|null */
    private array $params;

    /**
     * @param array<string, mixed>|list<mixed> $payload
     */
    final private function __construct(array $payload = [])
    {
        $this->params = $this->shape($payload);
    }

    /** @param array<string, mixed> $filter */
    final public function filter(array $filter): static
    {
        return static::fromParams(array_replace($this->params(), ['filter' => $filter]));
    }

    final public function params(): array
    {
        return $this->params;
    }

    final public function paramsAreList(): bool
    {
        /** @var array<string, bool> $listParamsByMethod */
        static $listParamsByMethod = [];

        return $listParamsByMethod[$this->method()] ??= (new JsonFileSchemaProvider())
            ->schemaFor($this)
            ->paramsAreList();
    }

    /**
     * Build a request directly from the method's manual-shaped params.
     *
     * @param array<string, mixed>|list<mixed> $params
     */
    final public static function fromParams(array $params): static
    {
        return new static($params);
    }

    /**
     * @param array<string, mixed>|list<mixed> $params
     *
     * @return array<string, mixed>|list<mixed>
     */
    private function shape(array $params): array
    {
        return $this->normalize($params);
    }

    private function normalize(mixed $value): mixed
    {
        if ($value instanceof BackedEnum) {
            return $value->value;
        }

        return is_array($value) ? array_map(function ($item) {
            return $this->normalize($item);
        }, $value) : $value;
    }
}
