<?php declare(strict_types=1);

namespace Idiot\Zabbix\Requests\Enums;

/**
 * Whether the action is enabled or disabled. Possible values: 0 - (default) enabled; 1 - disabled.
 */
enum ActionStatus: int
{
    case Enabled = 0;
    case Disabled = 1;
}
