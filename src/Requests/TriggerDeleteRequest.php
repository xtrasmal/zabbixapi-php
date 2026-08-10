<?php declare(strict_types=1);

namespace IntelliTrend\Zabbix\Requests;

final class TriggerDeleteRequest extends AbstractZabbixListRequest
{
    /** @param list<TriggerId> $ids */
    public function __construct(array $ids)
    {
        parent::__construct($ids);
    }

    public static function method(): string
    {
        return 'trigger.delete';
    }
}
