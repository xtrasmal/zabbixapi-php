<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Api\Requests\Enums;

/**
 * Whether the module is enabled or disabled. Possible values: 0 - (default) Disabled; 1 - Enabled.
 */
enum ModuleStatus: int
{
    case Disabled = 0;
    case Enabled = 1;
}
