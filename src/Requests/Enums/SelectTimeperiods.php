<?php declare(strict_types=1);

namespace Idiot\Zabbix\Requests\Enums;

/**
 * selectTimeperiods enum.
 */
enum SelectTimeperiods: string
{
    case Extend = 'extend';
    case Count = 'count';
}
