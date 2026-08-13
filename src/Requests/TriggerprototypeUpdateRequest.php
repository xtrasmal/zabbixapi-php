<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Requests;

/**
 * triggerprototype.update - Update existing trigger prototypes.
 */
final class TriggerprototypeUpdateRequest extends AbstractRequest
{
    public function method(): string
    {
        return 'triggerprototype.update';
    }
}
