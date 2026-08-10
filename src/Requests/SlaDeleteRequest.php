<?php declare(strict_types=1);

namespace IntelliTrend\Zabbix\Requests;

final class SlaDeleteRequest extends AbstractZabbixListRequest
{
    /** @param list<SlaId> $ids */
    public function __construct(array $ids)
    {
        parent::__construct($ids);
    }

    public static function method(): string
    {
        return 'sla.delete';
    }
}
