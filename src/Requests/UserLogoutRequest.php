<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Requests;

final class UserLogoutRequest extends AbstractRequest
{
    public function method(): string
    {
        return 'user.logout';
    }
}
