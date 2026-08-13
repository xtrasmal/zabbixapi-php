<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Api\Requests;

/**
 * script.create - Create new scripts.
 */
final class ScriptCreateRequest extends AbstractRequest
{
    public function method(): string
    {
        return 'script.create';
    }
}
