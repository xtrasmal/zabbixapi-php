<?php declare(strict_types=1);

namespace IntelliTrend\Zabbix\Requests\Enums;

/**
 * selectParents enum.
 */
enum SelectParents: string
{
    case Extend = 'extend';
    case Count = 'count';
}
