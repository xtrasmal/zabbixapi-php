<?php declare(strict_types=1);

namespace IntelliTrend\Zabbix\Requests\Enums;

/**
 * selectTriggerDiscovery enum.
 */
enum SelectTriggerDiscovery: string
{
    case Extend = 'extend';
    case Count = 'count';
}
