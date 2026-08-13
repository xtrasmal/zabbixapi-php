<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Requests;

/**
 * user.get - Retrieve users according to the given parameters.
 */
final class UserGetRequest extends AbstractRequest
{
    public function method(): string
    {
        return 'user.get';
    }
}
