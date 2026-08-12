<?php declare(strict_types=1);

namespace Idiot\Zabbix\Requests;

final class UserDeleteRequest extends AbstractZabbixRequest
{
    public function method(): string
    {
        return 'user.delete';
    }
}
