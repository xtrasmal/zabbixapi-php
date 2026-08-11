<?php declare(strict_types=1);

namespace IntelliTrend\Zabbix\Requests;

final class ProxygroupDeleteRequest extends AbstractZabbixListRequest
{
    /** @param list<ProxygroupId> $ids */
    public function __construct(array $ids)
    {
        parent::__construct($ids);
    }

    public function method(): string
    {
        return 'proxygroup.delete';
    }
}
