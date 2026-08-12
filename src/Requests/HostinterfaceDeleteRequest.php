<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Requests;

final class HostinterfaceDeleteRequest extends AbstractZabbixRequest
{
    public function method(): string
    {
        return 'hostinterface.delete';
    }
}
