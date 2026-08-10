<?php declare(strict_types=1);

namespace IntelliTrend\Zabbix\Requests;

final class HostprototypeDeleteRequest extends AbstractZabbixListRequest
{
    /** @param list<HostprototypeId> $ids */
    public function __construct(array $ids)
    {
        parent::__construct($ids);
    }

    public static function method(): string
    {
        return 'hostprototype.delete';
    }
}
