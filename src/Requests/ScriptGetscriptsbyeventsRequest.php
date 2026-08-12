<?php declare(strict_types=1);

namespace Idiot\Zabbix\Requests;

final class ScriptGetscriptsbyeventsRequest extends AbstractZabbixRequest
{
    public function method(): string
    {
        return 'script.getscriptsbyevents';
    }
}
