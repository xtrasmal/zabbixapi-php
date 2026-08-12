<?php declare(strict_types=1);

namespace Idiot\Zabbix\Requests;

final class ActionDeleteRequest extends AbstractZabbixRequest
{
    /** @param list<ActionId> $ids */
    public function __construct(array $ids)
    {
        parent::__construct($ids);
    }

    public function method(): string
    {
        return 'action.delete';
    }
}
