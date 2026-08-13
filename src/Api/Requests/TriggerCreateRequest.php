<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Api\Requests;

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
