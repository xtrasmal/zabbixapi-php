<?php declare(strict_types=1);

namespace IntelliTrend\Zabbix\Requests;

final class ReportDeleteRequest extends AbstractZabbixListRequest
{
    /** @param list<ReportId> $ids */
    public function __construct(array $ids)
    {
        parent::__construct($ids);
    }

    public static function method(): string
    {
        return 'report.delete';
    }
}
