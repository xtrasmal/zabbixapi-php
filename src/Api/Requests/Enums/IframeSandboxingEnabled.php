<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Api\Requests\Enums;

/**
 * Use iframe sandboxing. Possible values: 0 - Do not use; 1 - (default) Use.
 */
enum IframeSandboxingEnabled: int
{
    case DoNotUse = 0;
    case Use = 1;
}
