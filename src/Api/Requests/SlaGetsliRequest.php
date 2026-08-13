<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Api\Requests;

/**
 * sla.getsli - Calculate the Service Level Indicator (SLI) data for a Service Level Agreement (SLA).
 */
final class SlaGetsliRequest extends AbstractRequest
{
    public function method(): string
    {
        return 'sla.getsli';
    }
}
