<?php declare(strict_types=1);

namespace Idiot\Zabbix\Requests\Enums;

/**
 * selectInventory enum.
 */
enum SelectInventory: string
{
    case Extend = 'extend';
    case Count = 'count';
}
