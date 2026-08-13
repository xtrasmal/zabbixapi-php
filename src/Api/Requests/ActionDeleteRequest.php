<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Api\Requests;

final class ActionDeleteRequest extends AbstractRequest
{
    public function method(): string
    {
        return 'action.delete';
    }
}
