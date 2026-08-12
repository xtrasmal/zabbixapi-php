<?php declare(strict_types=1);

namespace Idiot\Zabbix\Requests\Enums;

/**
 * selectParentHost enum.
 */
enum SelectParentHost: string
{
    case Extend = 'extend';
    case Count = 'count';
}
