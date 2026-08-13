<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Api\Requests;

final class UserdirectoryDeleteRequest extends AbstractRequest
{
    public function method(): string
    {
        return 'userdirectory.delete';
    }
}
