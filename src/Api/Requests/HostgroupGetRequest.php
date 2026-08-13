<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Api\Requests;

/**
 * hostgroup.get - Retrieve host groups according to the given parameters.
 */
final class HostgroupGetRequest extends AbstractRequest
{
    public function method(): string
    {
        return 'hostgroup.get';
    }
}
