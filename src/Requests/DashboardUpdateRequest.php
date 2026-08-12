<?php declare(strict_types=1);

namespace Idiot\Zabbix\Requests;

/**
 * dashboard.update - Update existing dashboards.
 */
final class DashboardUpdateRequest extends AbstractZabbixRequest
{
    public function __construct(
        public string $dashboardid,
        public ?string $name = null,
        public ?string $userid = null,
        public ?Enums\DashboardPrivate $private = null,
        public ?Enums\DashboardDisplayPeriod $display_period = null,
        public ?Enums\DashboardAutoStart $auto_start = null,
        public ?array $pages = null,
        public ?array $users = null,
        public ?array $userGroups = null,
    ) {}

    public function method(): string
    {
        return 'dashboard.update';
    }
}
