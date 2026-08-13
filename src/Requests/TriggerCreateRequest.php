<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Requests;

/**
 * trigger.create - Create new triggers.
 */
final class TriggerCreateRequest extends AbstractRequest
{
    public function method(): string
    {
        return 'trigger.create';
    }
}
