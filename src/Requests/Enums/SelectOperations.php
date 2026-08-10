<?php declare(strict_types=1);

namespace IntelliTrend\Zabbix\Requests\Enums;

/**
 * selectOperations enum.
 */
enum SelectOperations: string
{
    case Extend = 'extend';
    case Count = 'count';
}
