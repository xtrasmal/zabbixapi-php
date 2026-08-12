<?php declare(strict_types=1);

namespace Idiot\Zabbix\Requests;

final class HostDeleteRequest extends AbstractZabbixRequest
{
    /** @param list<HostId> $ids */
    public function __construct(array $ids)
    {
        parent::__construct($ids);
    }

    public function method(): string
    {
        return 'host.delete';
    }
}
