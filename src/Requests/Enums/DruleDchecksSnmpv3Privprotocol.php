<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Requests\Enums;

/**
 * Privacy protocol. Possible values: 0 - (default) DES; 1 - AES128; 2 - AES192; 3 - AES256; 4 - AES192C; 5 - AES256C. Property behavior: supported if type is set to "SNMPv3 agent" and snmpv3_securitylevel is set to "authPriv".
 */
enum DruleDchecksSnmpv3Privprotocol: int
{
    case Des = 0;
    case Aes128 = 1;
    case Aes192 = 2;
    case Aes256 = 3;
    case Aes192c = 4;
    case Aes256c = 5;
}
