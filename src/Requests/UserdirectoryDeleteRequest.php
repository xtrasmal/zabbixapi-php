<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Requests;

final class UserdirectoryDeleteRequest extends AbstractZabbixRequest
{
    public function method(): string
    {
        return 'userdirectory.delete';
    }
}
