<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Api\Requests\Enums;

/**
 * Authentication method.  Possible values if type is set to "SSH agent": 0 - (default) password; 1 - public key.  Possible values if type is set to "HTTP agent": 0 - (default) none; 1 - basic; 2 - NTLM; 3 - Kerberos; 4 - Digest.  Property behavior: - supported if type is set to "SSH agent" or "HTTP agent" - read-only for inherited objects (if type is set to "HTTP agent") or discovered objects
 */
enum ItemAuthtype: int
{
    case None = 0;
    case Basic = 1;
    case Ntlm = 2;
    case Kerberos = 3;
    case Digest = 4;
}
