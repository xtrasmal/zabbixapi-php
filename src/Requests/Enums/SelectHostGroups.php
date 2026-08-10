<?php declare(strict_types=1);

namespace IntelliTrend\Zabbix\Requests\Enums;

/**
 * selectHostGroups enum.
 */
enum SelectHostGroups: string
{
    case Extend = 'extend';
    case Count = 'count';
}
