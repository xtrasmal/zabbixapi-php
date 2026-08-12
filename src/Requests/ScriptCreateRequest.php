<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Requests;

/**
 * script.create - Create new scripts.
 */
final class ScriptCreateRequest extends AbstractZabbixRequest
{
    public function method(): string
    {
        return 'script.create';
    }
}
