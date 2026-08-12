<?php declare(strict_types=1);

namespace Idiot\Zabbix\Requests;

/**
 * maintenance.update - Update existing maintenances.
 */
final class MaintenanceUpdateRequest extends AbstractZabbixRequest
{
    public function __construct(
        public string $maintenanceid,
        public ?string $name = null,
        public ?int $active_since = null,
        public ?int $active_till = null,
        public ?string $description = null,
        public ?Enums\MaintenanceType $maintenance_type = null,
        public ?Enums\MaintenanceTagsEvaltype $tags_evaltype = null,
        public ?array $groups = null,
        public ?array $hosts = null,
        public ?array $timeperiods = null,
        public ?array $tags = null,
        public ?array $groupids = null,
        public ?array $hostids = null,
    ) {}

    public function method(): string
    {
        return 'maintenance.update';
    }
}
