<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Requests;

/**
 * sla.create - Create new SLA objects.
 */
final class SlaCreateRequest extends AbstractZabbixRequest
{
    public function method(): string
    {
        return 'sla.create';
    }
}
