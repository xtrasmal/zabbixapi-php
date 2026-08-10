<?php declare(strict_types=1);

namespace IntelliTrend\Zabbix\Requests\Enums;

/**
 * Host inventory population mode. Possible values: -1 - disabled; 0 - manual; 1 - automatic.
 */
enum ActionInventoryMode: int
{
    case Disabled = -1;
    case Manual = 0;
    case Automatic = 1;
}
