<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Api\Requests;

/**
 * trigger.update - Update existing triggers.
 */
final class TriggerUpdateRequest extends AbstractRequest
{
    public function method(): string
    {
        return 'trigger.update';
    }
}
