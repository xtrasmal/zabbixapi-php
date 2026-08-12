<?php declare(strict_types=1);

namespace Idiot\Zabbix\Requests;

/**
 * user.update - Update existing users.
 */
final class UserUpdateRequest extends AbstractZabbixRequest
{
    public function method(): string
    {
        return 'user.update';
    }
}
