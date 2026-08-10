<?php declare(strict_types=1);

namespace IntelliTrend\Zabbix\Requests\Enums;

/**
 * Defines whether the macro is controlled by discovery rule. Possible values: 0 - (default) Macro is managed by user; 1 - Macro is managed by discovery rule. User is not allowed to create automatic macro. To update automatic macro, it must be converted to manual by setting automatic to 0.
 */
enum UsermacroAutomatic: int
{
    case MacroIsManagedByUser = 0;
    case MacroIsManagedByDiscovery = 1;
}
