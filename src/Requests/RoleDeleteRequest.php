<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Requests;

final class RoleDeleteRequest extends AbstractRequest
{
    public function method(): string
    {
        return 'role.delete';
    }
}
