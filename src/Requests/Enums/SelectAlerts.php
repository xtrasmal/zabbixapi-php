<?php declare(strict_types=1);

namespace IntelliTrend\Zabbix\Requests\Enums;

/**
 * select_alerts enum.
 */
enum SelectAlerts: string
{
    case Extend = 'extend';
    case Count = 'count';
}
