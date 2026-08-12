<?php declare(strict_types=1);

namespace Idiot\Zabbix\Requests\Enums;

/**
 * selectStatusRules enum.
 */
enum SelectStatusRules: string
{
    case Extend = 'extend';
    case Count = 'count';
}
