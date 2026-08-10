<?php declare(strict_types=1);

namespace IntelliTrend\Zabbix\Requests\Enums;

/**
 * Source for host name. Possible values: 1 - (default) DNS; 2 - IP; 3 - discovery value of this check.
 */
enum DruleDchecksHostSource: int
{
    case Dns = 1;
    case Ip = 2;
    case DiscoveryValueOfThisCheck = 3;
}
