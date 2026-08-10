<?php declare(strict_types=1);

namespace IntelliTrend\Zabbix\Requests\Enums;

/**
 * Use iframe sandboxing. Possible values: 0 - Do not use; 1 - (default) Use.
 */
enum IframeSandboxingEnabled: int
{
    case DoNotUse = 0;
    case Use = 1;
}
