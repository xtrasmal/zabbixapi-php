<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Requests\Enums;

/**
 * Source for visible name. Possible values: 0 - (default) not specified; 1 - DNS; 2 - IP; 3 - discovery value of this check.
 */
enum DruleDchecksNameSource: int
{
    case NotSpecified = 0;
    case Dns = 1;
    case Ip = 2;
    case DiscoveryValueOfThisCheck = 3;
}
