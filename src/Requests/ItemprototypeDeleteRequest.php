<?php declare(strict_types=1);

namespace Idiot\Zabbix\Requests;

final class ItemprototypeDeleteRequest extends AbstractZabbixRequest
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
