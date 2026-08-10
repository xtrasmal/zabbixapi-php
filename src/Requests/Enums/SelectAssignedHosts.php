<?php declare(strict_types=1);

namespace IntelliTrend\Zabbix\Requests\Enums;

/**
 * selectAssignedHosts enum.
 */
enum SelectAssignedHosts: string
{
    case Extend = 'extend';
    case Count = 'count';
}
