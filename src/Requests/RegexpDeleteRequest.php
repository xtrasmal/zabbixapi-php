<?php declare(strict_types=1);

namespace IntelliTrend\Zabbix\Requests;

final class RegexpDeleteRequest extends AbstractZabbixListRequest
{
    /** @param list<RegexpId> $ids */
    public function __construct(array $ids)
    {
        parent::__construct($ids);
    }

    public static function method(): string
    {
        return 'regexp.delete';
    }
}
