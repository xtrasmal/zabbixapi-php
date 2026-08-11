<?php declare(strict_types=1);

namespace IntelliTrend\Zabbix\Requests;

final class DashboardDeleteRequest extends AbstractZabbixListRequest
{
    /** @param list<DashboardId> $ids */
    public function __construct(array $ids)
    {
        parent::__construct($ids);
    }

    public function method(): string
    {
        return 'dashboard.delete';
    }
}
