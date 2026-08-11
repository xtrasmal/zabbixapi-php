<?php declare(strict_types=1);

namespace IntelliTrend\Zabbix\Requests;

/**
 * user.checkAuthentication - Check and prolong the user session. Calling this method using the sessionid parameter prolongs the user session by default.
 */
final class UserCheckAuthenticationRequest extends AbstractZabbixRequest
{
    public function __construct(
        public ?bool $extend = null,
        public ?string $sessionid = null,
        public ?string $token = null,
    ) {}

    public function method(): string
    {
        return 'user.checkAuthentication';
    }
}
