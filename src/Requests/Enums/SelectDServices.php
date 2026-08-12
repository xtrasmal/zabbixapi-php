<?php declare(strict_types=1);

namespace Idiot\Zabbix\Requests\Enums;

/**
 * selectDServices enum.
 */
enum SelectDServices: string
{
    case Extend = 'extend';
    case Count = 'count';
}
