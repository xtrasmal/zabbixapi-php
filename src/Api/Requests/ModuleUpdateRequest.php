<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Api\Requests;

/**
 * module.update - Update existing modules.
 */
final class ModuleUpdateRequest extends AbstractRequest
{
    public function method(): string
    {
        return 'module.update';
    }
}
