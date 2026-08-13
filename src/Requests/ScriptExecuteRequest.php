<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Requests;

/**
 * script.execute - Run a script on a host or event. Except for URL type scripts, which are not executable.
 */
final class ScriptExecuteRequest extends AbstractRequest
{
    public function method(): string
    {
        return 'script.execute';
    }
}
