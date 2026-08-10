<?php declare(strict_types=1);

namespace IntelliTrend\Zabbix\Requests\Enums;

/**
 * selectTriggers enum.
 */
enum SelectTriggers: string
{
    case Extend = 'extend';
    case Count = 'count';
}
