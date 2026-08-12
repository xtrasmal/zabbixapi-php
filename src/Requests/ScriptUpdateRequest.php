<?php declare(strict_types=1);

namespace Idiot\Zabbix\Requests;

/**
 * script.update - Update existing scripts. The scriptid property must be defined for each script; all other properties are optional and only the passed properties will be updated. An exception is the type property change from 5 (Webhook) to other: the parameters property will be cleaned.
 */
final class ScriptUpdateRequest extends AbstractZabbixRequest
{
    public function method(): string
    {
        return 'script.update';
    }
}
