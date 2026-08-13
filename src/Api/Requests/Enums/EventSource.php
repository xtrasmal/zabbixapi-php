<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Api\Requests\Enums;

/**
 * Return only events with the given type. Refer to the event object page for a list of supported event types. Possible values: 0 - event created by a trigger; 1 - event created by a discovery rule; 2 - event created by active agent autoregistration; 3 - internal event; 4 - event created on service status update. Default: 0 - trigger events.
 */
enum EventSource: int
{
    case TriggerEvents = 0;
    case EventCreatedByADiscovery = 1;
    case EventCreatedByActiveAgent = 2;
    case InternalEvent = 3;
    case EventCreatedOnServiceStatus = 4;
}
