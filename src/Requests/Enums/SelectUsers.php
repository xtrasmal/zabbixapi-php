<?php declare(strict_types=1);

namespace IntelliTrend\Zabbix\Requests\Enums;

/**
 * selectUsers enum.
 */
enum SelectUsers: string
{
    case Extend = 'extend';
    case Count = 'count';
}
