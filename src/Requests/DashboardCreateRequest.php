<?php declare(strict_types=1);

namespace IntelliTrend\Zabbix\Requests;

/**
 * dashboard.create - Create new dashboards.
 */
final class DashboardCreateRequest extends AbstractZabbixRequest
{
    public function __construct(
        public string $name,
        public array $pages,
        public ?string $userid = null,
        public ?Enums\DashboardPrivate $private = null,
        public ?Enums\DashboardDisplayPeriod $display_period = null,
        public ?Enums\DashboardAutoStart $auto_start = null,
        public ?array $users = null,
        public ?array $userGroups = null,
    ) {}

    public static function method(): string
    {
        return 'dashboard.create';
    }
}
