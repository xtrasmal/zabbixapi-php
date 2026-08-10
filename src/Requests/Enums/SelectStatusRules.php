<?php declare(strict_types=1);

namespace IntelliTrend\Zabbix\Requests\Enums;

/**
 * selectStatusRules enum.
 */
enum SelectStatusRules: string
{
    case Extend = 'extend';
    case Count = 'count';
}
