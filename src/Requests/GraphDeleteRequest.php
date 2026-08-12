<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Requests;

final class GraphDeleteRequest extends AbstractZabbixRequest
{
    public function method(): string
    {
        return 'graph.delete';
    }
}
