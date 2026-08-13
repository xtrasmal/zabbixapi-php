<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Api\Requests;

/**
 * module.create - Install new frontend modules.
 */
final class ModuleCreateRequest extends AbstractRequest
{
    public function method(): string
    {
        return 'module.create';
    }
}
