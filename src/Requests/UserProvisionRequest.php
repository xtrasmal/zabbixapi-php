<?php declare(strict_types=1);

namespace Idiot\Zabbix\Requests;

final class UserProvisionRequest extends AbstractZabbixRequest
{
    public function method(): string
    {
        return 'user.provision';
    }
}
