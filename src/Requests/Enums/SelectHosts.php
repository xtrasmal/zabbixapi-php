<?php declare(strict_types=1);

namespace IntelliTrend\Zabbix\Requests\Enums;

/**
 * selectHosts enum.
 */
enum SelectHosts: string
{
    case Extend = 'extend';
    case Count = 'count';
}
