<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Api\Requests;

/**
 * map.create - Create new maps.
 */
final class MapCreateRequest extends AbstractRequest
{
    public function method(): string
    {
        return 'map.create';
    }
}
