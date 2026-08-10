<?php declare(strict_types=1);

namespace IntelliTrend\Zabbix\Requests\Enums;

/**
 * selectInheritedTags enum.
 */
enum SelectInheritedTags: string
{
    case Extend = 'extend';
    case Count = 'count';
}
