<?php declare(strict_types=1);

namespace Idiot\Zabbix\Requests;

/**
 * graph.get - Retrieve graphs according to the given parameters.
 */
final class GraphGetRequest extends AbstractZabbixRequest
{
    public function method(): string
    {
        return 'graph.get';
    }
}
