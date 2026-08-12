<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Requests;

/**
 * host.massremove - Remove related objects from multiple hosts.
 */
final class HostMassremoveRequest extends AbstractZabbixRequest
{
    public function method(): string
    {
        return 'host.massremove';
    }
}
