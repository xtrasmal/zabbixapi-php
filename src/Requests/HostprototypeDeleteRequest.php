<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Requests;

final class HostprototypeDeleteRequest extends AbstractZabbixRequest
{
    public function method(): string
    {
        return 'hostprototype.delete';
    }
}
