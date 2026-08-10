<?php declare(strict_types=1);

namespace IntelliTrend\Zabbix\Requests;

/**
 * maintenance.create - Create new maintenances.
 */
final class MaintenanceCreateRequest extends AbstractZabbixRequest
{
    public function __construct(
        public string $name,
        public int $active_since,
        public int $active_till,
        public array $timeperiods,
        public ?string $description = null,
        public ?Enums\MaintenanceType $maintenance_type = null,
        public ?Enums\MaintenanceTagsEvaltype $tags_evaltype = null,
        public ?array $groups = null,
        public ?array $hosts = null,
        public ?array $tags = null,
        public ?array $groupids = null,
        public ?array $hostids = null,
    ) {}

    public static function method(): string
    {
        return 'maintenance.create';
    }
}
