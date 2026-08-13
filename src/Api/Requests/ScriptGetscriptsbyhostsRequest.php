<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Api\Requests;

final class ScriptGetscriptsbyhostsRequest extends AbstractRequest
{
    public function method(): string
    {
        return 'script.getscriptsbyhosts';
    }
}
