<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Api\Requests\Enums;

/**
 * Authentication method that will be used by the web scenario. Possible values: 0 - (default) none; 1 - basic HTTP authentication; 2 - NTLM authentication; 3 - Kerberos authentication; 4 - Digest authentication.
 */
enum Authentication: int
{
    case None = 0;
    case BasicHttpAuthentication = 1;
    case NtlmAuthentication = 2;
    case KerberosAuthentication = 3;
    case DigestAuthentication = 4;
}
