<?php declare(strict_types=1);

namespace Idiot\Zabbix\Requests;

final class UsermacroDeleteRequest extends AbstractZabbixRequest
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
