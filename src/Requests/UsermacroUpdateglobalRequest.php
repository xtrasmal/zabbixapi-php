<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Requests;

final class UsermacroUpdateglobalRequest extends AbstractZabbixRequest
{
    public function method(): string
    {
        return 'usermacro.updateglobal';
    }
}
