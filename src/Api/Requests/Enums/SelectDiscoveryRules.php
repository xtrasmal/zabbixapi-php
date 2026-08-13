<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Api\Requests\Enums;

/**
 * selectDiscoveryRules enum.
 */
enum SelectDiscoveryRules: string
{
    case Extend = 'extend';
    case Count = 'count';
}
