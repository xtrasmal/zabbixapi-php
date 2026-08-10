<?php declare(strict_types=1);

namespace IntelliTrend\Zabbix\Requests\Enums;

/**
 * output enum.
 */
enum Output: string
{
    case Extend = 'extend';
    case Count = 'count';
}
