<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Requests;

/**
 * user.create - Create new users.
 */
final class UserCreateRequest extends AbstractRequest
{
    public function method(): string
    {
        return 'user.create';
    }
}
