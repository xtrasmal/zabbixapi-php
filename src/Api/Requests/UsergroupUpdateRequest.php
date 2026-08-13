<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Api\Requests;

/**
 * usergroup.update - Update existing user groups.
 */
final class UsergroupUpdateRequest extends AbstractRequest
{
    public function method(): string
    {
        return 'usergroup.update';
    }
}
