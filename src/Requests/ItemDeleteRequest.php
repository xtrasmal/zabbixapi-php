<?php declare(strict_types=1);

namespace IntelliTrend\Zabbix\Requests;

final class ItemDeleteRequest extends AbstractZabbixListRequest
{
    /** @param list<ItemId> $ids */
    public function __construct(array $ids)
    {
        parent::__construct($ids);
    }

    public function method(): string
    {
        return 'item.delete';
    }
}
