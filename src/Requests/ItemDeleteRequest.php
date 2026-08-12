<?php declare(strict_types=1);

namespace Idiot\Zabbix\Requests;

final class ItemDeleteRequest extends AbstractZabbixRequest
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
