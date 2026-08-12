<?php declare(strict_types=1);

namespace Idiot\Zabbix\Requests\Enums;

/**
 * Whether the SAML logout responses should be signed with a SAML signature. Possible values: 0 - (default) Do not sign logout responses; 1 - Sign logout responses. Supported if idp_type is set to "User directory of type SAML".
 */
enum SignLogoutResponses: int
{
    case DoNotSignLogoutResponses = 0;
    case SignLogoutResponses = 1;
}
