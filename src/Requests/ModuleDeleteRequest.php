<?php declare(strict_types=1);

namespace Idiot\Zabbix\Requests;

final class ModuleDeleteRequest extends AbstractZabbixRequest
{
    public function method(): string
    {
        return 'module.delete';
    }
}
