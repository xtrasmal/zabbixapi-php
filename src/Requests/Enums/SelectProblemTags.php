<?php declare(strict_types=1);

namespace IntelliTrend\Zabbix\Requests\Enums;

/**
 * selectProblemTags enum.
 */
enum SelectProblemTags: string
{
    case Extend = 'extend';
    case Count = 'count';
}
