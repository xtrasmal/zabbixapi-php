<?php declare(strict_types=1);

namespace IntelliTrend\Zabbix\Requests;

/**
 * sla.create - Create new SLA objects.
 */
final class SlaCreateRequest extends AbstractZabbixRequest
{
    public function __construct(
        public string $name,
        public Enums\SlaPeriod $period,
        public float $slo,
        public string $timezone,
        public array $service_tags,
        public ?int $effective_date = null,
        public ?Enums\SlaStatus $status = null,
        public ?string $description = null,
        public ?array $schedule = null,
        public ?array $excluded_downtimes = null,
    ) {}

    public function method(): string
    {
        return 'sla.create';
    }
}
