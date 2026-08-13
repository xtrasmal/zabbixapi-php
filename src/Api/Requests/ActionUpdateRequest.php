<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Api\Requests;

/**
 * action.update - Update existing actions.
 */
final class ActionUpdateRequest extends AbstractRequest
{
    public function method(): string
    {
        return 'action.update';
    }
}
