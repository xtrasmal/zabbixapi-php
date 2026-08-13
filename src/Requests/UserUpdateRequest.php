<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Requests;

/**
 * user.update - Update existing users.
 */
final class UserUpdateRequest extends AbstractRequest
{
    public function method(): string
    {
        return 'user.update';
    }
}
