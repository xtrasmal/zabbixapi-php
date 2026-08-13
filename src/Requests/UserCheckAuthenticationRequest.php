<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Requests;

/**
 * user.checkAuthentication - Check and prolong the user session. Calling this method using the sessionid parameter prolongs the user session by default.
 */
final class UserCheckAuthenticationRequest extends AbstractRequest
{
    public function method(): string
    {
        return 'user.checkAuthentication';
    }
}
