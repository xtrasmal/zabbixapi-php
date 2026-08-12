<?php declare(strict_types=1);

namespace Idiot\Zabbix\Requests;

final class GraphprototypeDeleteRequest extends AbstractZabbixRequest
{
    public function method(): string
    {
        return 'graphprototype.delete';
    }
}
