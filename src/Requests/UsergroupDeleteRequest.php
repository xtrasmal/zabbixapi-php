<?php declare(strict_types=1);

namespace IntelliTrend\Zabbix\Requests;

final class UsergroupDeleteRequest extends AbstractZabbixListRequest
{
    /** @param list<UsergroupId> $ids */
    public function __construct(array $ids)
    {
        parent::__construct($ids);
    }

    public function method(): string
    {
        return 'usergroup.delete';
    }
}
