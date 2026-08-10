<?php declare(strict_types=1);

namespace IntelliTrend\Zabbix\Requests\Enums;

/**
 * selectSuppressionData enum.
 */
enum SelectSuppressionData: string
{
    case Extend = 'extend';
    case Count = 'count';
}
