<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Api\Requests\Enums;

/**
 * Log unmatched SNMP traps. Possible values: 0 - Do not log unmatched SNMP traps; 1 - (default) Log unmatched SNMP traps.
 */
enum SnmptrapLogging: int
{
    case DoNotLogUnmatchedSnmp = 0;
    case LogUnmatchedSnmpTraps = 1;
}
