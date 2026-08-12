<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Requests\Enums;

/**
 * Type of events that the action will handle. Possible values: 0 - event created by a trigger; 1 - event created by a discovery rule; 2 - event created by active agent autoregistration; 3 - internal event; 4 - event created on service status update. Property behavior: constant (cannot be changed after creation); required for create operations.
 */
enum ActionEventsource: int
{
    case EventCreatedByATrigger = 0;
    case EventCreatedByADiscovery = 1;
    case EventCreatedByActiveAgent = 2;
    case InternalEvent = 3;
    case EventCreatedOnServiceStatus = 4;
}
