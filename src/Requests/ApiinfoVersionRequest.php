<?php declare(strict_types=1);

namespace IntelliTrend\Zabbix\Requests;

final class ApiinfoVersionRequest extends AbstractZabbixListRequest
{
    /** @param list<ApiinfoId> $ids */
    public function __construct(array $ids)
    {
        parent::__construct($ids);
    }

    public static function method(): string
    {
        return 'apiinfo.version';
    }
}
