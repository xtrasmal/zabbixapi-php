<?php declare(strict_types=1);

namespace Idiot\Zabbix\Requests\Enums;

/**
 * selectParents enum.
 */
enum SelectParents: string
{
    case Extend = 'extend';
    case Count = 'count';
}
