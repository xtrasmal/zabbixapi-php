<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Api\Requests;

/**
 * trigger.get - Retrieve triggers according to the given parameters.
 */
final class TriggerGetRequest extends AbstractRequest
{
    public function method(): string
    {
        return 'trigger.get';
    }
}
