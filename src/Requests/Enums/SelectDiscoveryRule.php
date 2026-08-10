<?php declare(strict_types=1);

namespace IntelliTrend\Zabbix\Requests\Enums;

/**
 * selectDiscoveryRule enum.
 */
enum SelectDiscoveryRule: string
{
    case Extend = 'extend';
    case Count = 'count';
}
