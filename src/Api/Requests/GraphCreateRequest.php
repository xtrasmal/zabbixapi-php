<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Api\Requests;

/**
 * graph.create - Create new graphs.
 */
final class GraphCreateRequest extends AbstractRequest
{
    public function method(): string
    {
        return 'graph.create';
    }
}
