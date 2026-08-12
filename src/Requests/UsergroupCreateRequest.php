<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Requests;

/**
 * usergroup.create - Create new user groups.
 */
final class UsergroupCreateRequest extends AbstractZabbixRequest
{
    public function method(): string
    {
        return 'usergroup.create';
    }
}
