<?php declare(strict_types=1);

namespace IntelliTrend\Zabbix\Requests\Enums;

/**
 * Whether the user group is enabled or disabled. For deprovisioned users, the user group cannot be enabled. Possible values: 0 - (default) enabled; 1 - disabled.
 */
enum UsersStatus: int
{
    case Enabled = 0;
    case Disabled = 1;
}
