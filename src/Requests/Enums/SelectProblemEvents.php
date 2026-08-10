<?php declare(strict_types=1);

namespace IntelliTrend\Zabbix\Requests\Enums;

/**
 * selectProblemEvents enum.
 */
enum SelectProblemEvents: string
{
    case Extend = 'extend';
    case Count = 'count';
}
