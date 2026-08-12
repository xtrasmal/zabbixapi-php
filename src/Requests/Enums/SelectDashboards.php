<?php declare(strict_types=1);

namespace Idiot\Zabbix\Requests\Enums;

/**
 * selectDashboards enum.
 */
enum SelectDashboards: string
{
    case Extend = 'extend';
    case Count = 'count';
}
