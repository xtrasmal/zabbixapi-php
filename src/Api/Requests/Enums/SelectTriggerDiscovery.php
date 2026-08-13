<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Api\Requests\Enums;

/**
 * selectTriggerDiscovery enum.
 */
enum SelectTriggerDiscovery: string
{
    case Extend = 'extend';
    case Count = 'count';
}
