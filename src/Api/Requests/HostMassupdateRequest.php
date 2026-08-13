<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Api\Requests;

/**
 * host.massupdate - Simultaneously replace or remove related objects and update properties on multiple hosts.
 */
final class HostMassupdateRequest extends AbstractRequest
{
    public function method(): string
    {
        return 'host.massupdate';
    }
}
