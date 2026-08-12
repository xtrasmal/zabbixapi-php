<?php declare(strict_types=1);

namespace Idiot\Zabbix\Requests;

final class MapDeleteRequest extends AbstractZabbixRequest
{
    public function method(): string
    {
        return 'map.delete';
    }
}
