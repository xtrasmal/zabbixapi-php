<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Api\Requests;

final class UsermacroDeleteRequest extends AbstractRequest
{
    public function method(): string
    {
        return 'usermacro.delete';
    }
}
