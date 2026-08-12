<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Requests;

use ReflectionException;

/**
 * Base for generated Zabbix requests. Object-shaped requests collect every
 * non-null public property into a plain array; list-shaped requests pass their
 * payload through as the JSON-RPC params array. Constructor values are already
 * wire-ready scalars and arrays; normalization only unwraps backed enums and
 * ZabbixParameter values.
 */
abstract class AbstractZabbixRequest implements ZabbixRequest
{
    /** @var array<string, mixed>|list<mixed>|null */
    private ?array $manualParams = null;

    /**
     * @param array<string, mixed>|list<mixed> $payload
     */
    public function __construct(array $payload = [])
    {
        if ($this->paramsAreList()) {
            $this->manualParams = $payload;
        }
    }

    final public function with(string $name, mixed $value): static
    {
        return $this->withParam($name, $value);
    }

    /** @param array<string, mixed> $filter */
    final public function filter(array $filter): static
    {
        return $this->withParam('filter', $filter);
    }

    final public function output(array|string|\BackedEnum|null $output): static
    {
        return $this->withParam('output', $output);
    }

    final public function params(): array
    {
        if (null !== $this->manualParams) {
            return $this->shape($this->manualParams);
        }

        $params = [];
        foreach (get_object_vars($this) as $name => $value) {
            if ('manualParams' === $name) {
                continue;
            }
            if (null === $value) {
                continue;
            }
            $params[$name] = $this->normalize($value);
        }

        return $this->shape($params);
    }

    final public function paramsAreList(): bool
    {
        /** @var array<class-string, bool> $listParamsByClass */
        static $listParamsByClass = [];

        return $listParamsByClass[static::class] ??= $this->constructorAcceptsListPayload();
    }

    /**
     * Build a request directly from the method's manual-shaped params.
     *
     * @param array<string, mixed>|list<mixed> $params
     * @throws ReflectionException
     */
    final public static function fromParams(array $params): static
    {
        $request = (new \ReflectionClass(static::class))->newInstanceWithoutConstructor();
        $request->manualParams = $params;

        return $request;
    }

    final protected function withParam(string $name, mixed $value): static
    {
        return static::fromParams(array_replace($this->params(), [$name => $value]));
    }

    /**
     * @param array<string, mixed>|list<mixed> $params
     *
     * @return array<string, mixed>|list<mixed>
     */
    private function shape(array $params): array
    {
        $params = $this->normalize($params);

        return $this->paramsAreList() ? array_values($params) : $params;
    }

    private function constructorAcceptsListPayload(): bool
    {
        $constructor = (new \ReflectionClass(static::class))->getConstructor();

        if (null === $constructor || static::class !== $constructor->getDeclaringClass()->getName()) {
            return false;
        }

        $parameters = $constructor->getParameters();

        if (1 !== count($parameters)) {
            return false;
        }

        $parameter = $parameters[0];

        return !$parameter->isPromoted()
            && $parameter->hasType()
            && 'array' === (string)$parameter->getType();
    }

    private function normalize(mixed $value): mixed
    {
        if ($value instanceof \BackedEnum) {
            return $value->value;
        }

        if ($value instanceof ZabbixParameter) {
            return $value->toZabbixValue();
        }

        return is_array($value) ? array_map(function ($item) {
            return $this->normalize($item);
        }, $value) : $value;

    }
}
