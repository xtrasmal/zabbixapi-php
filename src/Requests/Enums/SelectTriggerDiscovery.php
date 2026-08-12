<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Requests\Enums;

/**
 * selectTriggerDiscovery enum.
 */
enum SelectTriggerDiscovery: string
{
    case Extend = 'extend';
    case Count = 'count';
}
