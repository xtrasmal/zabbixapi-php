<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Api\Requests;

/**
 * role.get - Retrieve user roles according to the given parameters.
 */
final class RoleGetRequest extends AbstractRequest
{
    public function method(): string
    {
        return 'role.get';
    }
}
