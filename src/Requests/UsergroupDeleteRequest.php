<?php declare(strict_types=1);

namespace Idiot\Zabbix\Requests;

final class UsergroupDeleteRequest extends AbstractZabbixRequest
{
    public function method(): string
    {
        return 'usergroup.delete';
    }
}
