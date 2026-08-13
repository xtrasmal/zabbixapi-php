<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Requests;

/**
 * hostgroup.propagate - Propagate permissions and tag filters to all subgroups of a host group.
 */
final class HostgroupPropagateRequest extends AbstractRequest
{
    public function method(): string
    {
        return 'hostgroup.propagate';
    }
}
