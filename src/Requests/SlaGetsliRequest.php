<?php declare(strict_types=1);

namespace Idiot\Zabbix\Requests;

/**
 * sla.getsli - Calculate the Service Level Indicator (SLI) data for a Service Level Agreement (SLA).
 */
final class SlaGetsliRequest extends AbstractZabbixRequest
{
    public function __construct(
        public string $slaid,
        public ?int $period_from = null,
        public ?int $period_to = null,
        public ?int $periods = null,
        public string|array|null $serviceids = null,
    ) {}

    public function method(): string
    {
        return 'sla.getsli';
    }
}
