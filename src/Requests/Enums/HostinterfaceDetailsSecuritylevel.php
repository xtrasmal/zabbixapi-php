<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Requests\Enums;

/**
 * SNMPv3 security level. Used only by SNMPv3 interfaces. Possible values: 0 - (default) - noAuthNoPriv; 1 - authNoPriv; 2 - authPriv.
 */
enum HostinterfaceDetailsSecuritylevel: int
{
    case Noauthnopriv = 0;
    case Authnopriv = 1;
    case Authpriv = 2;
}
