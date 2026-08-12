<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Requests;

final class UserdirectoryUpdateRequest extends AbstractZabbixRequest
{
    public function method(): string
    {
        return 'userdirectory.update';
    }
}
