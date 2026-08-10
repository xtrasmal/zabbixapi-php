<?php declare(strict_types=1);

namespace IntelliTrend\Zabbix\Requests\Enums;

/**
 * selectParentHost enum.
 */
enum SelectParentHost: string
{
    case Extend = 'extend';
    case Count = 'count';
}
