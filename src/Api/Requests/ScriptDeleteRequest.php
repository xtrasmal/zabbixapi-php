<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Api\Requests;

final class ScriptDeleteRequest extends AbstractRequest
{
    public function method(): string
    {
        return 'script.delete';
    }
}
