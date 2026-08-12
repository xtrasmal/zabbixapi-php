<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Requests;

/**
 * hostinterface.massremove - Remove host interfaces from the given hosts.
 */
final class HostinterfaceMassremoveRequest extends AbstractZabbixRequest
{
    public function method(): string
    {
        return 'hostinterface.massremove';
    }
}
