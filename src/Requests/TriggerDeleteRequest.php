<?php declare(strict_types=1);

namespace Idiot\Zabbix\Requests;

final class TriggerDeleteRequest extends AbstractZabbixRequest
{
    /** @param list<TriggerId> $ids */
    public function __construct(array $ids)
    {
        parent::__construct($ids);
    }

    public function method(): string
    {
        return 'trigger.delete';
    }
}
