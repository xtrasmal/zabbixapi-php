<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Api\Requests;

final class UsermacroCreateRequest extends AbstractRequest
{
    public function method(): string
    {
        return 'usermacro.create';
    }
}
