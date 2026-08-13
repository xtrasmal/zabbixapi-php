<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Api\Requests;

/**
 * action.create - Create new actions.
 */
final class ActionCreateRequest extends AbstractRequest
{
    public function method(): string
    {
        return 'action.create';
    }
}
