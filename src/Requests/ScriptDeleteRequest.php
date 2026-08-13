<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Requests;

final class ScriptDeleteRequest extends AbstractRequest
{
    public function method(): string
    {
        return 'script.delete';
    }
}
