<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Requests;

/**
 * sla.get - Retrieve SLA objects according to the given parameters.
 */
final class SlaGetRequest extends AbstractZabbixRequest
{
    public function method(): string
    {
        return 'sla.get';
    }
}
