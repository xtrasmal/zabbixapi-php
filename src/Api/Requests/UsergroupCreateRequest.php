<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Api\Requests;

/**
 * usergroup.create - Create new user groups.
 */
final class UsergroupCreateRequest extends AbstractRequest
{
    public function method(): string
    {
        return 'usergroup.create';
    }
}
