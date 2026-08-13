<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Requests;

/**
 * hostgroup.massremove - Remove related objects from multiple host groups.
 */
final class HostgroupMassremoveRequest extends AbstractRequest
{
    public function method(): string
    {
        return 'hostgroup.massremove';
    }
}
