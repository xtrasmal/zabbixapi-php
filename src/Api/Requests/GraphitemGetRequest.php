<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Api\Requests;

/**
 * graphitem.get - Retrieve graph items according to the given parameters.
 */
final class GraphitemGetRequest extends AbstractRequest
{
    public function method(): string
    {
        return 'graphitem.get';
    }
}
