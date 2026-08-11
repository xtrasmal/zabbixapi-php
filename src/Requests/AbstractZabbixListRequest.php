<?php declare(strict_types=1);

namespace IntelliTrend\Zabbix\Requests;

/**
 * Base for list-shaped requests whose params() is a bare JSON array, not an
 * object. Immutable by convention.
 */
abstract class AbstractZabbixListRequest implements ZabbixRequest
{
    /** @var list<mixed>|null */
    private ?array $manualParams = null;

    public function __construct(public array $payload) {}

    /** @param list<mixed> $params */
    final public static function fromParams(array $params): static
    {
        $request = (new \ReflectionClass(static::class))->newInstanceWithoutConstructor();
        $request->manualParams = $params;

        return $request;
    }

    /** @param list<mixed> $ids */
    final public static function ids(array $ids): static
    {
        return new static($ids);
    }

    final public function params(): array
    {
        return array_values($this->normalize($this->manualParams ?? $this->payload));
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
