<?php declare(strict_types=1);

namespace Idiot\Zabbix\Requests;

/**
 * hostgroup.get - Retrieve host groups according to the given parameters.
 */
final class HostgroupGetRequest extends AbstractZabbixRequest
{
    public function method(): string
    {
        return 'hostgroup.get';
    }
}
