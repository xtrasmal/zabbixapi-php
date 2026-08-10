<?php declare(strict_types=1);

namespace IntelliTrend\Zabbix\Requests\Enums;

/**
 * selectHostDiscovery enum.
 */
enum SelectHostDiscovery: string
{
    case Extend = 'extend';
    case Count = 'count';
}
