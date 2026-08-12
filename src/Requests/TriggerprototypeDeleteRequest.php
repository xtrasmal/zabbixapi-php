<?php declare(strict_types=1);

namespace Idiot\Zabbix\Requests;

final class TriggerprototypeDeleteRequest extends AbstractZabbixRequest
{
    /** @param list<TriggerprototypeId> $ids */
    public function __construct(array $ids)
    {
        parent::__construct($ids);
    }

    public function method(): string
    {
        return 'triggerprototype.delete';
    }
}
