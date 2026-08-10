<?php declare(strict_types=1);

namespace IntelliTrend\Zabbix\Requests\Enums;

/**
 * selectExpressions enum.
 */
enum SelectExpressions: string
{
    case Extend = 'extend';
    case Count = 'count';
}
