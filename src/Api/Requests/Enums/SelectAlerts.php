<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Api\Requests\Enums;

/**
 * select_alerts enum.
 */
enum SelectAlerts: string
{
    case Extend = 'extend';
    case Count = 'count';
}
