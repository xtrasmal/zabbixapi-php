<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Requests;

final class UsermacroDeleteglobalRequest extends AbstractZabbixRequest
{
    public function method(): string
    {
        return 'usermacro.deleteglobal';
    }
}
