<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Requests;

/**
 * user.login - Log in to the API and generate an authentication token. This method must be called without the auth parameter in the JSON-RPC request, and is only available to unauthenticated users who do not belong to any user group with enabled multi-factor authentication.
 */
final class UserLoginRequest extends AbstractRequest
{
    public function method(): string
    {
        return 'user.login';
    }
}
