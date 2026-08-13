<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Api\Requests\Enums;

/**
 * Whether the trigger is enabled or disabled.  Possible values: 0 - (default) enabled; 1 - disabled.
 */
enum TriggerStatus: int
{
    case Enabled = 0;
    case Disabled = 1;
}
