<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Api\Requests\Enums;

/**
 * SNMPv3 security level. Possible values: 0 - (default) noAuthNoPriv; 1 - authNoPriv; 2 - authPriv. Property behavior: supported if version is set to "SNMPv3" (3).
 */
enum Securitylevel: int
{
    case Noauthnopriv = 0;
    case Authnopriv = 1;
    case Authpriv = 2;
}
