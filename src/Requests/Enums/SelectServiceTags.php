<?php declare(strict_types=1);

namespace IntelliTrend\Zabbix\Requests\Enums;

/**
 * selectServiceTags enum.
 */
enum SelectServiceTags: string
{
    case Extend = 'extend';
    case Count = 'count';
}
