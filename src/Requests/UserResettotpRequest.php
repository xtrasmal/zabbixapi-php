<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Requests;

final class UserResettotpRequest extends AbstractRequest
{
    public function method(): string
    {
        return 'user.resettotp';
    }
}
