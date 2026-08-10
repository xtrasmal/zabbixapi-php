<?php declare(strict_types=1);

namespace IntelliTrend\Zabbix\Requests;

/**
 * sla.update - Update existing SLA entries.
 */
final class SlaUpdateRequest extends AbstractZabbixRequest
{
    public function __construct(
        public string $slaid,
        public ?string $name = null,
        public ?Enums\SlaPeriod $period = null,
        public ?float $slo = null,
        public ?int $effective_date = null,
        public ?string $timezone = null,
        public ?Enums\SlaStatus $status = null,
        public ?string $description = null,
        public ?array $service_tags = null,
        public ?array $schedule = null,
        public ?array $excluded_downtimes = null,
    ) {}

    public static function method(): string
    {
        return 'sla.update';
    }
}
