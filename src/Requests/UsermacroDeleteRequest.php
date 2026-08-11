<?php declare(strict_types=1);

namespace IntelliTrend\Zabbix\Requests;

final class UsermacroDeleteRequest extends AbstractZabbixListRequest
{
    /** @param list<UsermacroId> $ids */
    public function __construct(array $ids)
    {
        parent::__construct($ids);
    }

    public function method(): string
    {
        return 'usermacro.delete';
    }
}
