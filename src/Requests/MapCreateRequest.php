<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Requests;

/**
 * map.create - Create new maps.
 */
final class MapCreateRequest extends AbstractZabbixRequest
{
    public function method(): string
    {
        return 'map.create';
    }
}
