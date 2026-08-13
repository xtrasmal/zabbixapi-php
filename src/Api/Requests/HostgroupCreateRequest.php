<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Api\Requests;

/**
 * hostgroup.create - Create new host groups.
 */
final class HostgroupCreateRequest extends AbstractRequest
{
    public function method(): string
    {
        return 'hostgroup.create';
    }
}
