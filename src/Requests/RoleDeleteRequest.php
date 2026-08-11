<?php declare(strict_types=1);

namespace IntelliTrend\Zabbix\Requests;

final class RoleDeleteRequest extends AbstractZabbixListRequest
{
    /** @param list<RoleId> $ids */
    public function __construct(array $ids)
    {
        parent::__construct($ids);
    }

    public function method(): string
    {
        return 'role.delete';
    }
}
