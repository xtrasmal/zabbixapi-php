<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Requests;

/**
 * hostgroup.update - Update existing host groups.
 */
final class HostgroupUpdateRequest extends AbstractZabbixRequest
{
    public function method(): string
    {
        return 'hostgroup.update';
    }
}
