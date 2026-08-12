<?php declare(strict_types=1);

namespace Idiot\Zabbix\Requests;

final class HistoryPushRequest extends AbstractZabbixRequest
{
    /** @param list<array> $ids */
    public function __construct(array $ids)
    {
        parent::__construct($ids);
    }

    public function method(): string
    {
        return 'history.push';
    }
}
