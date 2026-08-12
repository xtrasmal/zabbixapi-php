<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Requests;

final class TriggerDeleteRequest extends AbstractZabbixRequest
{
    public function method(): string
    {
        return 'trigger.delete';
    }
}
