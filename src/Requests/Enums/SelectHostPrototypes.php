<?php declare(strict_types=1);

namespace IntelliTrend\Zabbix\Requests\Enums;

/**
 * selectHostPrototypes enum.
 */
enum SelectHostPrototypes: string
{
    case Extend = 'extend';
    case Count = 'count';
}
