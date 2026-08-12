<?php declare(strict_types=1);

namespace Idiot\Zabbix\Requests\Enums;

/**
 * selectDRules enum.
 */
enum SelectDRules: string
{
    case Extend = 'extend';
    case Count = 'count';
}
