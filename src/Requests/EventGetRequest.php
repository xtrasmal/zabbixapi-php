<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Requests;

/**
 * event.get - Retrieve events according to the given parameters.
 */
final class EventGetRequest extends AbstractZabbixRequest
{
    public function method(): string
    {
        return 'event.get';
    }
}
