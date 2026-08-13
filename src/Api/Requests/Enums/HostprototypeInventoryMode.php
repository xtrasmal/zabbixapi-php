<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Api\Requests\Enums;

/**
 * Host inventory population mode. Possible values: -1 - (default) disabled; 0 - manual; 1 - automatic.
 */
enum HostprototypeInventoryMode: int
{
    case Disabled = -1;
    case Manual = 0;
    case Automatic = 1;
}
