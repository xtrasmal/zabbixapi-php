<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Requests;

/**
 * module.update - Update existing modules.
 */
final class ModuleUpdateRequest extends AbstractZabbixRequest
{
    public function method(): string
    {
        return 'module.update';
    }
}
