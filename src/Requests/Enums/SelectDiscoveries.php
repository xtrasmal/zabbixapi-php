<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Requests\Enums;

/**
 * selectDiscoveries enum.
 */
enum SelectDiscoveries: string
{
    case Extend = 'extend';
    case Count = 'count';
}
