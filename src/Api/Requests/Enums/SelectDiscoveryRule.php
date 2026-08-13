<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Api\Requests\Enums;

/**
 * selectDiscoveryRule enum.
 */
enum SelectDiscoveryRule: string
{
    case Extend = 'extend';
    case Count = 'count';
}
