<?php declare(strict_types=1);

namespace Idiot\Zabbix\Requests;

final class UsermacroUpdateRequest extends AbstractZabbixRequest
{
    public function method(): string
    {
        return 'usermacro.update';
    }
}
