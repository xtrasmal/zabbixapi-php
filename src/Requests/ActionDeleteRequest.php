<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Requests;

final class ActionDeleteRequest extends AbstractZabbixRequest
{
    public function method(): string
    {
        return 'action.delete';
    }
}
