<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Requests;

/**
 * sla.getsli - Calculate the Service Level Indicator (SLI) data for a Service Level Agreement (SLA).
 */
final class SlaGetsliRequest extends AbstractZabbixRequest
{
    public function method(): string
    {
        return 'sla.getsli';
    }
}
