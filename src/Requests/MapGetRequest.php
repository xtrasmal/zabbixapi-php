<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Requests;

/**
 * map.get - Retrieve maps according to the given parameters.
 */
final class MapGetRequest extends AbstractZabbixRequest
{
    public function method(): string
    {
        return 'map.get';
    }
}
