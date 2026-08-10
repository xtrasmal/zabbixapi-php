<?php declare(strict_types=1);

namespace IntelliTrend\Zabbix\Requests;

/**
 * Base for list-shaped requests (host.delete, ...) whose params() is a bare
 * JSON array, not an object. Immutable by convention.
 */
abstract class AbstractZabbixListRequest implements ZabbixRequest
{
    public function __construct(public array $ids) {}

    final public function params(): array
    {
        return array_values($this->ids);
    }
}
