<?php declare(strict_types=1);

namespace IntelliTrend\Zabbix\Requests;

final class TemplatedashboardDeleteRequest extends AbstractZabbixListRequest
{
    /** @param list<TemplatedashboardId> $ids */
    public function __construct(array $ids)
    {
        parent::__construct($ids);
    }

    public function method(): string
    {
        return 'templatedashboard.delete';
    }
}
