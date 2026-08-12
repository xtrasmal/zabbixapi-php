<?php declare(strict_types=1);

namespace Idiot\Zabbix\Requests;

/**
 * report.update - Update existing scheduled reports.
 */
final class ReportUpdateRequest extends AbstractZabbixRequest
{
    public function __construct(
        public string $reportid,
        public ?string $userid = null,
        public ?string $name = null,
        public ?string $dashboardid = null,
        public ?Enums\ReportPeriod $period = null,
        public ?Enums\Cycle $cycle = null,
        public ?int $start_time = null,
        public ?int $weekdays = null,
        public ?string $active_since = null,
        public ?string $active_till = null,
        public ?string $subject = null,
        public ?string $message = null,
        public ?Enums\ReportStatus $status = null,
        public ?string $description = null,
        public ?array $users = null,
        public ?array $user_groups = null,
    ) {}

    public function method(): string
    {
        return 'report.update';
    }
}
