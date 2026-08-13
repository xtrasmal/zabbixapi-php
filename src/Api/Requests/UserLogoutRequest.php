<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Api\Requests;

final class UserLogoutRequest extends AbstractRequest
{
    public function method(): string
    {
        return 'user.logout';
    }
}
