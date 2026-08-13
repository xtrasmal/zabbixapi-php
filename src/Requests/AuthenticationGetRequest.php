<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Requests;

/**
 * authentication.get - Retrieve authentication settings according to the given parameters. Only available to Super admin user type.
 */
final class AuthenticationGetRequest extends AbstractRequest
{
    public function method(): string
    {
        return 'authentication.get';
    }
}
