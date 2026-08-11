<?php declare(strict_types=1);

namespace IntelliTrend\Zabbix\Requests;

final class DiscoveryruleDeleteRequest extends AbstractZabbixListRequest
{
    /** @param list<DiscoveryruleId> $ids */
    public function __construct(array $ids)
    {
        parent::__construct($ids);
    }

    public function method(): string
    {
        return 'discoveryrule.delete';
    }
}
