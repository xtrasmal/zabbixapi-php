<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Api\Requests;

/**
 * hostgroup.massadd - Simultaneously add multiple related objects to all the given host groups.
 */
final class HostgroupMassaddRequest extends AbstractRequest
{
    public function method(): string
    {
        return 'hostgroup.massadd';
    }
}
