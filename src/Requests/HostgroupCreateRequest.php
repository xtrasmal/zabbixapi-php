<?php declare(strict_types=1);

namespace Idiot\Zabbix\Requests;

/**
 * hostgroup.create - Create new host groups.
 */
final class HostgroupCreateRequest extends AbstractZabbixRequest
{
    public function method(): string
    {
        return 'hostgroup.create';
    }
}
