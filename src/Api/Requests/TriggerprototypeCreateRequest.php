<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Api\Requests;

/**
 * triggerprototype.create - Create new trigger prototypes.
 */
final class TriggerprototypeCreateRequest extends AbstractRequest
{
    public function method(): string
    {
        return 'triggerprototype.create';
    }
}
