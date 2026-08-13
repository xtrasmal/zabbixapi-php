<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Requests;

final class GraphDeleteRequest extends AbstractRequest
{
    public function method(): string
    {
        return 'graph.delete';
    }
}
