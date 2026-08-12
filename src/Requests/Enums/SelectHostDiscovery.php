<?php declare(strict_types=1);

namespace Idiot\Zabbix\Requests\Enums;

/**
 * selectHostDiscovery enum.
 */
enum SelectHostDiscovery: string
{
    case Extend = 'extend';
    case Count = 'count';
}
