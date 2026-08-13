<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Api\Requests\Enums;

/**
 * Whether the SAML assertions should be encrypted. Possible values: 0 - (default) Do not encrypt assertions; 1 - Encrypt assertions. Supported if idp_type is set to "User directory of type SAML".
 */
enum EncryptAssertions: int
{
    case DoNotEncryptAssertions = 0;
    case EncryptAssertions = 1;
}
