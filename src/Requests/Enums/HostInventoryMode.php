<?php declare(strict_types=1);

namespace Idiot\Zabbix\Requests\Enums;

/**
 * Host inventory population mode. Possible values: -1 - (default) disabled; 0 - manual; 1 - automatic.
 */
enum HostInventoryMode: int
{
    case Disabled = -1;
    case Manual = 0;
    case Automatic = 1;
}
