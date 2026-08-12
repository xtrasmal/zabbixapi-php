<?php declare(strict_types=1);

namespace Idiot\Zabbix\Requests\Enums;

/**
 * selectActions enum.
 */
enum SelectActions: string
{
    case Extend = 'extend';
    case Count = 'count';
}
