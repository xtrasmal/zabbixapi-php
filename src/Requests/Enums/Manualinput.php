<?php declare(strict_types=1);

namespace Idiot\Zabbix\Requests\Enums;

/**
 * Indicates whether the script accepts user-provided input. Supported if scope is set to "manual host action" or "manual event action". Possible values: 0 - (default) Disabled; 1 - Enabled.
 */
enum Manualinput: int
{
    case Disabled = 0;
    case Enabled = 1;
}
