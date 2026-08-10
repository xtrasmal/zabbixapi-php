<?php declare(strict_types=1);

namespace IntelliTrend\Zabbix\Requests\Enums;

/**
 * selectGroupDiscoveries enum.
 */
enum SelectGroupDiscoveries: string
{
    case Extend = 'extend';
    case Count = 'count';
}
