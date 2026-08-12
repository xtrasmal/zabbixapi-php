<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Requests\Enums;

/**
 * Whether debug mode is enabled or disabled. Possible values: 0 - (default) disabled; 1 - enabled.
 */
enum DebugMode: int
{
    case Disabled = 0;
    case Enabled = 1;
}
