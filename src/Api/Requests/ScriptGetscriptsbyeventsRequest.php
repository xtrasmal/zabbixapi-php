<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Api\Requests;

final class ScriptGetscriptsbyeventsRequest extends AbstractRequest
{
    public function method(): string
    {
        return 'script.getscriptsbyevents';
    }
}
