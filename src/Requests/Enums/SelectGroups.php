<?php declare(strict_types=1);

namespace Idiot\Zabbix\Requests\Enums;

/**
 * selectGroups enum.
 */
enum SelectGroups: string
{
    case Extend = 'extend';
    case Count = 'count';
}
