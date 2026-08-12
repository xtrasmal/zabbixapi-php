<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Requests;

/**
 * trigger.get - Retrieve triggers according to the given parameters.
 */
final class TriggerGetRequest extends AbstractZabbixRequest
{
    public function method(): string
    {
        return 'trigger.get';
    }
}
