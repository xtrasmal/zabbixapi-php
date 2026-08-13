<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Api\Requests;

/**
 * hostgroup.update - Update existing host groups.
 */
final class HostgroupUpdateRequest extends AbstractRequest
{
    public function method(): string
    {
        return 'hostgroup.update';
    }
}
