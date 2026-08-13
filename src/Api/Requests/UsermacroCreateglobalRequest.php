<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Api\Requests;

final class UsermacroCreateglobalRequest extends AbstractRequest
{
    public function method(): string
    {
        return 'usermacro.createglobal';
    }
}
