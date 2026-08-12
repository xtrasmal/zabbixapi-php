<?php declare(strict_types=1);

namespace Idiot\Zabbix\Requests\Enums;

/**
 * Whether the trigger prototype is enabled or disabled. Possible values: 0 - (default) enabled; 1 - disabled.
 */
enum TriggerprototypeStatus: int
{
    case Enabled = 0;
    case Disabled = 1;
}
