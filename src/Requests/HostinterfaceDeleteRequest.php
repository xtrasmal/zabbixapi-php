<?php declare(strict_types=1);

namespace Idiot\Zabbix\Requests;

final class HostinterfaceDeleteRequest extends AbstractZabbixRequest
{
    /** @param list<HostinterfaceId> $ids */
    public function __construct(array $ids)
    {
        parent::__construct($ids);
    }

    public function method(): string
    {
        return 'hostinterface.delete';
    }
}
