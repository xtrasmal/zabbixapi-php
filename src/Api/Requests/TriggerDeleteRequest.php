<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Api\Requests;

final class TriggerDeleteRequest extends AbstractRequest
{
    public function method(): string
    {
        return 'trigger.delete';
    }
}
