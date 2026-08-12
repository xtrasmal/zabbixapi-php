<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Requests;

final class ScriptGetscriptsbyhostsRequest extends AbstractZabbixRequest
{
    public function method(): string
    {
        return 'script.getscriptsbyhosts';
    }
}
