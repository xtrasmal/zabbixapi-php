<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Requests\Enums;

/**
 * Whether the SAML assertions should be signed with a SAML signature. Possible values: 0 - (default) Do not sign assertions; 1 - Sign assertions. Supported if idp_type is set to "User directory of type SAML".
 */
enum SignAssertions: int
{
    case DoNotSignAssertions = 0;
    case SignAssertions = 1;
}
