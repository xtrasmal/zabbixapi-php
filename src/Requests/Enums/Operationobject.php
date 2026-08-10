<?php declare(strict_types=1);

namespace IntelliTrend\Zabbix\Requests\Enums;

/**
 * Type of discovered object to perform the action on. Possible values: 0 - Item prototype; 1 - Trigger prototype; 2 - Graph prototype; 3 - Host prototype. Property behavior: required.
 */
enum Operationobject: int
{
    case ItemPrototype = 0;
    case TriggerPrototype = 1;
    case GraphPrototype = 2;
    case HostPrototype = 3;
}
