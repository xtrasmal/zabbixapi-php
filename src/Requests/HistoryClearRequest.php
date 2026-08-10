<?php declare(strict_types=1);

namespace IntelliTrend\Zabbix\Requests;

final class HistoryClearRequest extends AbstractZabbixListRequest
{
    /** @param list<HistoryId> $ids */
    public function __construct(array $ids)
    {
        parent::__construct($ids);
    }

    public static function method(): string
    {
        return 'history.clear';
    }
}
