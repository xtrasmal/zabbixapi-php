<?php declare(strict_types=1);

namespace Idiot\Zabbix\Requests;

final class GraphprototypeDeleteRequest extends AbstractZabbixRequest
{
    /** @param list<GraphprototypeId> $ids */
    public function __construct(array $ids)
    {
        parent::__construct($ids);
    }

    public function method(): string
    {
        return 'graphprototype.delete';
    }
}
