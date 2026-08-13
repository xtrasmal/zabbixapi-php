<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Api\Requests;

final class HostgroupDeleteRequest extends AbstractRequest
{
    public function method(): string
    {
        return 'hostgroup.delete';
    }
}
