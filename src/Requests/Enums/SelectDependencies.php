<?php declare(strict_types=1);

namespace IntelliTrend\Zabbix\Requests\Enums;

/**
 * selectDependencies enum.
 */
enum SelectDependencies: string
{
    case Extend = 'extend';
    case Count = 'count';
}
