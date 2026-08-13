<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Requests;

final class UsergroupDeleteRequest extends AbstractRequest
{
    public function method(): string
    {
        return 'usergroup.delete';
    }
}
