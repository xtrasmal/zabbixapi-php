<?php declare(strict_types=1);

namespace IntelliTrend\Zabbix\Requests\Enums;

/**
 * Whether to expand macros in labels when configuring the map. Possible values: 0 - (default) do not expand macros; 1 - expand macros.
 */
enum ExpandMacros: int
{
    case DoNotExpandMacros = 0;
    case ExpandMacros = 1;
}
