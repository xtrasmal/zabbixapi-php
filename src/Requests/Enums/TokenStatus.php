<?php declare(strict_types=1);

namespace IntelliTrend\Zabbix\Requests\Enums;

/**
 * Token status. Possible values: 0 - (default) enabled token; 1 - disabled token.
 */
enum TokenStatus: int
{
    case EnabledToken = 0;
    case DisabledToken = 1;
}
