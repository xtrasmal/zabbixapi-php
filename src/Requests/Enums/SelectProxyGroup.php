<?php declare(strict_types=1);

namespace IntelliTrend\Zabbix\Requests\Enums;

/**
 * selectProxyGroup enum.
 */
enum SelectProxyGroup: string
{
    case Extend = 'extend';
    case Count = 'count';
}
