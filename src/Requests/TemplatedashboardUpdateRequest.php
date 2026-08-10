<?php declare(strict_types=1);

namespace IntelliTrend\Zabbix\Requests;

/**
 * templatedashboard.update - Update existing template dashboards.
 */
final class TemplatedashboardUpdateRequest extends AbstractZabbixRequest
{
    public function __construct(
        public string $dashboardid,
        public ?string $name = null,
        public ?string $templateid = null,
        public ?Enums\TemplatedashboardDisplayPeriod $display_period = null,
        public ?Enums\TemplatedashboardAutoStart $auto_start = null,
        public ?string $uuid = null,
        public ?array $pages = null,
    ) {}

    public static function method(): string
    {
        return 'templatedashboard.update';
    }
}
