<?php declare(strict_types=1);

namespace Idiot\Zabbix\Requests;

final class HostprototypeDeleteRequest extends AbstractZabbixRequest
{
    /** @param list<HostprototypeId> $ids */
    public function __construct(array $ids)
    {
        parent::__construct($ids);
    }

    public function method(): string
    {
        return 'hostprototype.delete';
    }
}
