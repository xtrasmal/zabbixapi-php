<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Requests;

/**
 * script.get - Retrieve scripts according to the given parameters.
 */
final class ScriptGetRequest extends AbstractZabbixRequest
{
    public function method(): string
    {
        return 'script.get';
    }
}
