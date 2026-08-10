<?php declare(strict_types=1);

namespace IntelliTrend\Zabbix\Requests\Enums;

/**
 * selectChildren enum.
 */
enum SelectChildren: string
{
    case Extend = 'extend';
    case Count = 'count';
}
