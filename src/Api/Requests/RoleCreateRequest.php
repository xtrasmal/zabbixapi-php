<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Api\Requests;

/**
 * role.create - Create new user roles.
 */
final class RoleCreateRequest extends AbstractRequest
{
    public function method(): string
    {
        return 'role.create';
    }
}
