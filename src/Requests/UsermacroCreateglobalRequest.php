<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Requests;

final class UsermacroCreateglobalRequest extends AbstractZabbixRequest
{
    public function method(): string
    {
        return 'usermacro.createglobal';
    }
}
