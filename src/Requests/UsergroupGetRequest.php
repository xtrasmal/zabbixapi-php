<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Requests;

/**
 * usergroup.get - Retrieve user groups according to the given parameters.
 */
final class UsergroupGetRequest extends AbstractRequest
{
    public function method(): string
    {
        return 'usergroup.get';
    }
}
