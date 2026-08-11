<?php declare(strict_types=1);

namespace IntelliTrend\Zabbix\Requests;

final class IconmapDeleteRequest extends AbstractZabbixListRequest
{
    /** @param list<IconmapId> $ids */
    public function __construct(array $ids)
    {
        parent::__construct($ids);
    }

    public function method(): string
    {
        return 'iconmap.delete';
    }
}
