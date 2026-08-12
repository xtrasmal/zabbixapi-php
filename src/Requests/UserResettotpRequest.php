<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Requests;

final class UserResettotpRequest extends AbstractZabbixRequest
{
    public function method(): string
    {
        return 'user.resettotp';
    }
}
