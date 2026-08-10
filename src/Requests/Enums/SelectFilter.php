<?php declare(strict_types=1);

namespace IntelliTrend\Zabbix\Requests\Enums;

/**
 * selectFilter enum.
 */
enum SelectFilter: string
{
    case Extend = 'extend';
    case Count = 'count';
}
