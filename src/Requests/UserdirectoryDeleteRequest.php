<?php declare(strict_types=1);

namespace IntelliTrend\Zabbix\Requests;

final class UserdirectoryDeleteRequest extends AbstractZabbixListRequest
{
    /** @param list<UserdirectoryId> $ids */
    public function __construct(array $ids)
    {
        parent::__construct($ids);
    }

    public function method(): string
    {
        return 'userdirectory.delete';
    }
}
