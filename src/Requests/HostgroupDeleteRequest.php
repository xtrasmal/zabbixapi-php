<?php declare(strict_types=1);

namespace Idiot\Zabbix\Requests;

final class HostgroupDeleteRequest extends AbstractZabbixRequest
{
    public function method(): string
    {
        return 'hostgroup.delete';
    }
}
