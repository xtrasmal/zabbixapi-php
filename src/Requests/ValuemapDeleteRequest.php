<?php declare(strict_types=1);

namespace Idiot\Zabbix\Requests;

final class ValuemapDeleteRequest extends AbstractZabbixRequest
{
    public function method(): string
    {
        return 'valuemap.delete';
    }
}
