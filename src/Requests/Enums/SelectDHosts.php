<?php declare(strict_types=1);

namespace Idiot\Zabbix\Requests\Enums;

/**
 * selectDHosts enum.
 */
enum SelectDHosts: string
{
    case Extend = 'extend';
    case Count = 'count';
}
