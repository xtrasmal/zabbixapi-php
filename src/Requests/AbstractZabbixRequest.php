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
    final public function params(): array
    {
        $params = [];
        foreach (get_object_vars($this) as $name => $value) {
            if ($value === null) {
                continue;
            }
            $params[$name] = $value instanceof \BackedEnum ? $value->value : $value;
        }

        return $params;
    }
}
