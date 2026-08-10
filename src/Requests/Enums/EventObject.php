<?php declare(strict_types=1);

namespace IntelliTrend\Zabbix\Requests\Enums;

/**
 * Return only events created by objects of the given type. Refer to the event object page for a list of supported object types. Possible values if source is set to "event created by a trigger": 0 - trigger. Possible values if source is set to "event created by a discovery rule": 1 - discovered host; 2 - discovered service. Possible values if source is set to "event created by active agent autoregistration": 3 - auto-registered host. Possible values if source is set to "internal event": 0 - trigger; 4 - item; 5 - LLD rule. Possible values if source is set to "event created on service status update": 6 - service. Default: 0 - trigger.
 */
enum EventObject: int
{
    case Trigger = 0;
    case DiscoveredHost = 1;
    case DiscoveredService = 2;
    case AutoRegisteredHost = 3;
    case Item = 4;
    case LldRule = 5;
    case Service = 6;
}
