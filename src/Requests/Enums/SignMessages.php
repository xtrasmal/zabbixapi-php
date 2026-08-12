<?php declare(strict_types=1);

namespace Idiot\Zabbix\Requests\Enums;

/**
 * Whether the SAML messages should be signed with a SAML signature. Possible values: 0 - (default) Do not sign messages; 1 - Sign messages. Supported if idp_type is set to "User directory of type SAML".
 */
enum SignMessages: int
{
    case DoNotSignMessages = 0;
    case SignMessages = 1;
}
