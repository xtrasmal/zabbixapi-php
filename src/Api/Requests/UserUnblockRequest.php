<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Api\Requests;

final class UserUnblockRequest extends AbstractRequest
{
    public function method(): string
    {
        return 'user.unblock';
    }
}
