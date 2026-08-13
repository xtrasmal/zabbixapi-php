<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Api\Requests;

/**
 * graph.update - Update existing graphs. Only the graphid property is required; only passed properties are updated, the rest remain unchanged.
 */
final class GraphUpdateRequest extends AbstractRequest
{
    public function method(): string
    {
        return 'graph.update';
    }
}
