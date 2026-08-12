<?php declare(strict_types=1);

namespace Idiot\Zabbix\Requests;

final class UserdirectoryDeleteRequest extends AbstractZabbixRequest
{
    /** @param list<UserdirectoryId> $ids */
    public function __construct(array $ids)
    {
        parent::__construct($ids);
    }

    public function method(): string
    {
        return 'userdirectory.delete';
    }
}
