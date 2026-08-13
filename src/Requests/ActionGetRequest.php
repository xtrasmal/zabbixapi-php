<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Requests;

/**
 * action.get - Retrieve actions according to the given parameters.
 */
final class ActionGetRequest extends AbstractRequest
{
    public function method(): string
    {
        return 'action.get';
    }
}
