<?php declare(strict_types=1);

namespace IntelliTrend\Zabbix\Requests;

/**
 * Base for typed Zabbix IDs (HostId, ItemId, ...). Zabbix IDs travel as numeric
 * strings on the wire; this guards their shape at construction so a malformed
 * ID cannot reach the API.
 */
abstract class AbstractId implements ZabbixParameter
{
    private function __construct(private string $value) {}

    public static function fromString(string $value): static
    {
        if ($value === '' || !ctype_digit($value)) {
            throw new \InvalidArgumentException(
                static::class . ": id must be a numeric string, got '{$value}'."
            );
        }

        return new static($value);
    }

    public static function fromInt(int $value): static
    {
        return static::fromString((string) $value);
    }

    public function toZabbixValue(): string
    {
        return $this->value;
    }
}
