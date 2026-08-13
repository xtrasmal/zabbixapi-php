<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Api\Requests;

final class UsermacroUpdateRequest extends AbstractRequest
{
    public function method(): string
    {
        return 'usermacro.update';
    }
}
