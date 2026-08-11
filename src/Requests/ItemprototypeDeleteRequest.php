<?php declare(strict_types=1);

namespace IntelliTrend\Zabbix\Requests;

final class ItemprototypeDeleteRequest extends AbstractZabbixListRequest
{
    /** @param list<ItemprototypeId> $ids */
    public function __construct(array $ids)
    {
        parent::__construct($ids);
    }

    public function method(): string
    {
        return 'itemprototype.delete';
    }
}
