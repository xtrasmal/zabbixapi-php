<?php declare(strict_types=1);

namespace IntelliTrend\Zabbix\Requests\Enums;

/**
 * Whether to override global item timeouts on the proxy level. Possible values: 0 - (default) use global settings; 1 - override timeouts.
 */
enum CustomTimeouts: int
{
    case UseGlobalSettings = 0;
    case OverrideTimeouts = 1;
}
