<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Api\Requests;

final class RoleDeleteRequest extends AbstractRequest
{
    public function method(): string
    {
        return 'role.delete';
    }
}
