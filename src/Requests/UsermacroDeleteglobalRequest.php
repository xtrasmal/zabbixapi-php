<?php declare(strict_types=1);

namespace IntelliTrend\Zabbix\Requests;

final class UsermacroDeleteglobalRequest extends AbstractZabbixListRequest
{
    /** @param list<UsermacroId> $ids */
    public function __construct(array $ids)
    {
        parent::__construct($ids);
    }

    public static function method(): string
    {
        return 'usermacro.deleteglobal';
    }
}
