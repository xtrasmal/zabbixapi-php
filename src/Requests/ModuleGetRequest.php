<?php declare(strict_types=1);

namespace Idiot\Zabbix\Requests;

/**
 * module.get - Retrieve modules according to the given parameters.
 */
final class ModuleGetRequest extends AbstractZabbixRequest
{
    public function method(): string
    {
        return 'module.get';
    }
}
