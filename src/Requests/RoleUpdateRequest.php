<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Requests;

/**
 * role.update - Update existing user roles.
 */
final class RoleUpdateRequest extends AbstractRequest
{
    public function method(): string
    {
        return 'role.update';
    }
}
