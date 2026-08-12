<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Requests;

/**
 * action.update - Update existing actions.
 */
final class ActionUpdateRequest extends AbstractZabbixRequest
{
    public function method(): string
    {
        return 'action.update';
    }
}
