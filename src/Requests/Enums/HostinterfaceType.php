<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Requests\Enums;

/**
 * Interface type. Possible values: 1 - Agent; 2 - SNMP; 3 - IPMI; 4 - JMX. Property behavior: required for create operations.
 */
enum HostinterfaceType: int
{
    case Agent = 1;
    case Snmp = 2;
    case Ipmi = 3;
    case Jmx = 4;
}
