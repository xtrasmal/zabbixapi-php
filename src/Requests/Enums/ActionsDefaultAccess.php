<?php declare(strict_types=1);

namespace Idiot\Zabbix\Requests\Enums;

/**
 * Whether access to new actions is enabled. Possible values: 0 - disabled; 1 - (default) enabled.
 */
enum ActionsDefaultAccess: int
{
    case Disabled = 0;
    case Enabled = 1;
}
