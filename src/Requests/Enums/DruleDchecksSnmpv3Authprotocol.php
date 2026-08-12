<?php declare(strict_types=1);

namespace Idiot\Zabbix\Requests\Enums;

/**
 * Authentication protocol. Possible values: 0 - (default) MD5; 1 - SHA1; 2 - SHA224; 3 - SHA256; 4 - SHA384; 5 - SHA512. Property behavior: supported if type is set to "SNMPv3 agent" and snmpv3_securitylevel is set to "authNoPriv" or "authPriv".
 */
enum DruleDchecksSnmpv3Authprotocol: int
{
    case Md5 = 0;
    case Sha1 = 1;
    case Sha224 = 2;
    case Sha256 = 3;
    case Sha384 = 4;
    case Sha512 = 5;
}
