<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Requests;

/**
 * triggerprototype.get - Retrieve trigger prototypes according to the given parameters.
 */
final class TriggerprototypeGetRequest extends AbstractRequest
{
    public function method(): string
    {
        return 'triggerprototype.get';
    }
}
