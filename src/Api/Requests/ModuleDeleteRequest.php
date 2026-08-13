<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Api\Requests;

final class ModuleDeleteRequest extends AbstractRequest
{
    public function method(): string
    {
        return 'module.delete';
    }
}
