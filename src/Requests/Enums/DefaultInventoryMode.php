<?php declare(strict_types=1);

namespace IntelliTrend\Zabbix\Requests\Enums;

/**
 * Default host inventory mode. Possible values: -1 - (default) Disabled; 0 - Manual; 1 - Automatic.
 */
enum DefaultInventoryMode: int
{
    case Disabled = -1;
    case Manual = 0;
    case Automatic = 1;
}
