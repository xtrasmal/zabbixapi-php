<?php declare(strict_types=1);

namespace IntelliTrend\Zabbix\Requests\Enums;

/**
 * selectDashboards enum.
 */
enum SelectDashboards: string
{
    case Extend = 'extend';
    case Count = 'count';
}
