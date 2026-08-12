<?php declare(strict_types=1);

namespace Idiot\Zabbix\Requests\Enums;

/**
 * SNMP interface version. Possible values: 1 - SNMPv1; 2 - SNMPv2c; 3 - SNMPv3. Property behavior: required.
 */
enum Version: int
{
    case Snmpv1 = 1;
    case Snmpv2c = 2;
    case Snmpv3 = 3;
}
