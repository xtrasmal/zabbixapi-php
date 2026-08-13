<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Api\Requests\Enums;

/**
 * selectDashboards enum.
 */
enum SelectDashboards: string
{
    case Extend = 'extend';
    case Count = 'count';
}
