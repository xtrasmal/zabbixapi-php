<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Requests;

/**
 * role.create - Create new user roles.
 */
final class RoleCreateRequest extends AbstractZabbixRequest
{
    public function method(): string
    {
        return 'role.create';
    }
}
