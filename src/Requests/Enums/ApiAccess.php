<?php declare(strict_types=1);

namespace IntelliTrend\Zabbix\Requests\Enums;

/**
 * Whether access to API is enabled. Possible values: 0 - disabled; 1 - (default) enabled.
 */
enum ApiAccess: int
{
    case Disabled = 0;
    case Enabled = 1;
}
