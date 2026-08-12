<?php declare(strict_types=1);

namespace Idiot\Zabbix\Requests\Enums;

/**
 * selectUpdateOperations enum.
 */
enum SelectUpdateOperations: string
{
    case Extend = 'extend';
    case Count = 'count';
}
