<?php declare(strict_types=1);

namespace IntelliTrend\Zabbix\Requests;

final class UserdirectoryCreateRequest extends AbstractZabbixListRequest
{
    /** @param list<array> $ids */
    public function __construct(array $ids)
    {
        parent::__construct($ids);
    }

    public function method(): string
    {
        return 'userdirectory.create';
    }
}
