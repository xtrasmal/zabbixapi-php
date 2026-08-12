<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Requests;

/**
 * hostgroup.massadd - Simultaneously add multiple related objects to all the given host groups.
 */
final class HostgroupMassaddRequest extends AbstractZabbixRequest
{
    public function method(): string
    {
        return 'hostgroup.massadd';
    }
}
