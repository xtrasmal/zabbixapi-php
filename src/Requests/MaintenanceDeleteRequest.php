<?php declare(strict_types=1);

namespace IntelliTrend\Zabbix\Requests;

final class MaintenanceDeleteRequest extends AbstractZabbixListRequest
{
    /** @param list<MaintenanceId> $ids */
    public function __construct(array $ids)
    {
        parent::__construct($ids);
    }

    public static function method(): string
    {
        return 'maintenance.delete';
    }
}
