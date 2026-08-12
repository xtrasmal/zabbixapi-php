<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Requests;

/**
 * host.massupdate - Simultaneously replace or remove related objects and update properties on multiple hosts.
 */
final class HostMassupdateRequest extends AbstractZabbixRequest
{
    public function method(): string
    {
        return 'host.massupdate';
    }
}
