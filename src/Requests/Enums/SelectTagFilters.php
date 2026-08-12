<?php declare(strict_types=1);

namespace Idiot\Zabbix\Requests\Enums;

/**
 * selectTagFilters enum.
 */
enum SelectTagFilters: string
{
    case Extend = 'extend';
    case Count = 'count';
}
