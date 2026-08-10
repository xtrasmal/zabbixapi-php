<?php declare(strict_types=1);

namespace IntelliTrend\Zabbix\Requests\Enums;

/**
 * selectGraphs enum.
 */
enum SelectGraphs: string
{
    case Extend = 'extend';
    case Count = 'count';
}
