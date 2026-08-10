<?php declare(strict_types=1);

namespace IntelliTrend\Zabbix\Requests\Enums;

/**
 * Whether the discovery rule is enabled. Possible values: 0 - (default) enabled; 1 - disabled.
 */
enum DruleStatus: int
{
    case Enabled = 0;
    case Disabled = 1;
}
