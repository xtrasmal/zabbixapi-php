<?php declare(strict_types=1);

namespace IntelliTrend\Zabbix\Requests\Enums;

/**
 * Whether the SAML AuthN requests should be signed with a SAML signature. Possible values: 0 - (default) Do not sign AuthN requests; 1 - Sign AuthN requests. Supported if idp_type is set to "User directory of type SAML".
 */
enum SignAuthnRequests: int
{
    case DoNotSignAuthnRequests = 0;
    case SignAuthnRequests = 1;
}
