<?php declare(strict_types=1);

namespace IntelliTrend\Zabbix\Requests;

final class GraphprototypeDeleteRequest extends AbstractZabbixListRequest
{
    /** @param list<GraphprototypeId> $ids */
    public function __construct(array $ids)
    {
        parent::__construct($ids);
    }

    public static function method(): string
    {
        return 'graphprototype.delete';
    }
}
