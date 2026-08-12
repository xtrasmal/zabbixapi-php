<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Requests\Enums;

/**
 * Security level. Possible values: 0 - noAuthNoPriv; 1 - authNoPriv; 2 - authPriv. Property behavior: supported if type is set to "SNMPv3 agent". NOTE: documentation source lists the Type column for this property as 'string' even though possible values are the digits 0-2; encoded here as a string enum to match the documented type verbatim.
 */
enum DruleDchecksSnmpv3Securitylevel: string
{
    case N2 = '0';
    case Authnopriv = '1';
    case Authpriv = '2';
}
