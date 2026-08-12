<?php declare(strict_types=1);

namespace Idiot\Zabbix\Requests;

final class RegexpDeleteRequest extends AbstractZabbixRequest
{
    /** @param list<RegexpId> $ids */
    public function __construct(array $ids)
    {
        parent::__construct($ids);
    }

    public function method(): string
    {
        return 'regexp.delete';
    }
}
