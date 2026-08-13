<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Api\Requests\Enums;

/**
 * selectGraphDiscovery enum.
 */
enum SelectGraphDiscovery: string
{
    case Extend = 'extend';
    case Count = 'count';
}
