<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Api\Requests\Enums;

/**
 * selectGroupDiscoveries enum.
 */
enum SelectGroupDiscoveries: string
{
    case Extend = 'extend';
    case Count = 'count';
}
