<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Requests;

final class RoleDeleteRequest extends AbstractZabbixRequest
{
    public function method(): string
    {
        return 'role.delete';
    }
}
