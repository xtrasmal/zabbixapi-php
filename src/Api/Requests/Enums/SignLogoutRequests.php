<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Api\Requests\Enums;

/**
 * Whether the SAML logout requests should be signed with a SAML signature. Possible values: 0 - (default) Do not sign logout requests; 1 - Sign logout requests. Supported if idp_type is set to "User directory of type SAML".
 */
enum SignLogoutRequests: int
{
    case DoNotSignLogoutRequests = 0;
    case SignLogoutRequests = 1;
}
