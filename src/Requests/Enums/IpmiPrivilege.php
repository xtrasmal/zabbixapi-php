<?php declare(strict_types=1);

namespace IntelliTrend\Zabbix\Requests\Enums;

/**
 * IPMI privilege level. Possible values: 1 - callback; 2 - (default) user; 3 - operator; 4 - admin; 5 - OEM.
 */
enum IpmiPrivilege: int
{
    case Callback = 1;
    case User = 2;
    case Operator = 3;
    case Admin = 4;
    case Oem = 5;
}
