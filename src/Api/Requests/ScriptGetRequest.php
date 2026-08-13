<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Api\Requests;

/**
 * script.get - Retrieve scripts according to the given parameters.
 */
final class ScriptGetRequest extends AbstractRequest
{
    public function method(): string
    {
        return 'script.get';
    }
}
