<?php declare(strict_types=1);

namespace Idiot\Zabbix\Requests;

final class UserUnblockRequest extends AbstractZabbixRequest
{
    /** @param list<UserId> $ids */
    public function __construct(array $ids)
    {
        parent::__construct($ids);
    }

    public function method(): string
    {
        return 'user.unblock';
    }
}
