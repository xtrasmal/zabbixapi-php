<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Requests;

final class UserUnblockRequest extends AbstractRequest
{
    public function method(): string
    {
        return 'user.unblock';
    }
}
