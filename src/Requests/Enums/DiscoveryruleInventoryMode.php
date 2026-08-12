<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Requests\Enums;

/**
 * Override the host prototype inventory mode. Possible values: -1 - disabled; 0 - (default) manual; 1 - automatic. Property behavior: required.
 */
enum DiscoveryruleInventoryMode: int
{
    case Disabled = -1;
    case Manual = 0;
    case Automatic = 1;
}
