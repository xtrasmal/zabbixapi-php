<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Requests;

/**
 * module.create - Install new frontend modules.
 */
final class ModuleCreateRequest extends AbstractZabbixRequest
{
    public function method(): string
    {
        return 'module.create';
    }
}
