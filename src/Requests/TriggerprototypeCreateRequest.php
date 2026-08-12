<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Requests;

/**
 * triggerprototype.create - Create new trigger prototypes.
 */
final class TriggerprototypeCreateRequest extends AbstractZabbixRequest
{
    public function method(): string
    {
        return 'triggerprototype.create';
    }
}
