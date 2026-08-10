<?php declare(strict_types=1);

namespace IntelliTrend\Zabbix\Requests;

/**
 * templatedashboard.create - Create new template dashboards.
 */
final class TemplatedashboardCreateRequest extends AbstractZabbixRequest
{
    public function __construct(
        public string $name,
        public string $templateid,
        public array $pages,
        public ?Enums\TemplatedashboardDisplayPeriod $display_period = null,
        public ?Enums\TemplatedashboardAutoStart $auto_start = null,
        public ?string $uuid = null,
    ) {}

    public static function method(): string
    {
        return 'templatedashboard.create';
    }
}
