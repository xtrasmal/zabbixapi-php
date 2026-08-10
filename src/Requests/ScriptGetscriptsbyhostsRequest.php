<?php declare(strict_types=1);

namespace IntelliTrend\Zabbix\Requests;

final class ScriptGetscriptsbyhostsRequest extends AbstractZabbixListRequest
{
    /** @param list<array> $ids */
    public function __construct(array $ids)
    {
        parent::__construct($ids);
    }

    public static function method(): string
    {
        return 'script.getscriptsbyhosts';
    }
}
