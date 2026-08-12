<?php declare(strict_types=1);

namespace Idiot\Zabbix\Requests\Enums;

/**
 * selectGroupPrototypes enum.
 */
enum SelectGroupPrototypes: string
{
    case Extend = 'extend';
    case Count = 'count';
}
