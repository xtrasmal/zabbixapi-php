<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Requests;

/**
 * hostinterface.create - Create new host interfaces.
 */
final class HostinterfaceCreateRequest extends AbstractZabbixRequest
{
    public function method(): string
    {
        return 'hostinterface.create';
    }
}
