<?php declare(strict_types=1);

namespace IntelliTrend\Zabbix\Requests\Enums;

/**
 * selectTagFilters enum.
 */
enum SelectTagFilters: string
{
    case Extend = 'extend';
    case Count = 'count';
}
