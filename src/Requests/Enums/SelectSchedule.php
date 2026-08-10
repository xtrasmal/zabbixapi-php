<?php declare(strict_types=1);

namespace IntelliTrend\Zabbix\Requests\Enums;

/**
 * selectSchedule enum.
 */
enum SelectSchedule: string
{
    case Extend = 'extend';
    case Count = 'count';
}
