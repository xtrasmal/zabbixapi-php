<?php declare(strict_types=1);

namespace IntelliTrend\Zabbix\Requests;

/**
 * Base for object-shaped requests (host.get, host.create, ...). params()
 * collects every non-null public property into a plain array. Constructor
 * values are already wire-ready scalars and arrays; the only conversion is
 * unwrapping a backed enum (typed param) to its scalar ->value.
 * Immutable by convention: set once via the constructor, never mutated.
 */
abstract class AbstractZabbixRequest implements ZabbixRequest
{
    /** @var array<string, mixed>|list<mixed>|null */
    private ?array $manualParams = null;

    /**
     * Build a request directly from the method's manual-shaped params.
     *
     * @param array<string, mixed>|list<mixed> $params
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

    final public function params(): array
    {
        if ($this->manualParams !== null) {
            return $this->normalize($this->manualParams);
        }

        $params = [];
        foreach (get_object_vars($this) as $name => $value) {
            if ($name === 'manualParams') {
                continue;
            }
            if ($value === null) {
                continue;
            }
            $params[$name] = $this->normalize($value);
        }

        return $params;
    }

    private function normalize(mixed $value): mixed
    {
        if ($value instanceof \BackedEnum) {
            return $value->value;
        }

        if ($value instanceof ZabbixParameter) {
            return $value->toZabbixValue();
        }

        if (is_array($value)) {
            $normalized = [];
            foreach ($value as $key => $item) {
                $normalized[$key] = $this->normalize($item);
            }

            return $normalized;
        }

        return $value;
    }
}
