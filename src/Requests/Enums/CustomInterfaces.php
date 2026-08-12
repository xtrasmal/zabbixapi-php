<?php declare(strict_types=1);

namespace Idiot\Zabbix\Requests\Enums;

/**
 * Source of custom interfaces for hosts created by the host prototype. Possible values: 0 - (default) inherit interfaces from parent host; 1 - use host prototypes custom interfaces. Property behavior: read-only for inherited objects.
 */
enum CustomInterfaces: int
{
    case InheritInterfacesFromParentHost = 0;
    case UseHostPrototypesCustomInterfaces = 1;
}
