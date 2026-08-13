<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Api\Requests\Enums;

/**
 * Interface type. Possible values: 1 - Agent; 2 - SNMP; 3 - IPMI; 4 - JMX. Property behavior: required.
 */
enum HostprototypeType: int
{
    case Agent = 1;
    case Snmp = 2;
    case Ipmi = 3;
    case Jmx = 4;
}
