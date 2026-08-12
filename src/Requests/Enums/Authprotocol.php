<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Requests\Enums;

/**
 * SNMPv3 authentication protocol. Possible values: 0 - (default) MD5; 1 - SHA1; 2 - SHA224; 3 - SHA256; 4 - SHA384; 5 - SHA512. Property behavior: supported if version is set to "SNMPv3" (3) and securitylevel is set to "authNoPriv" (1) or "authPriv" (2).
 */
enum Authprotocol: int
{
    case Md5 = 0;
    case Sha1 = 1;
    case Sha224 = 2;
    case Sha256 = 3;
    case Sha384 = 4;
    case Sha512 = 5;
}
