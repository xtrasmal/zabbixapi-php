<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Requests;

final class UserdirectoryCreateRequest extends AbstractRequest
{
    public function method(): string
    {
        return 'userdirectory.create';
    }
}
