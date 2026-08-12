<?php declare(strict_types=1);

namespace Idiot\Zabbix\Requests;

/**
 * graph.create - Create new graphs.
 */
final class GraphCreateRequest extends AbstractZabbixRequest
{
    public function method(): string
    {
        return 'graph.create';
    }
}
