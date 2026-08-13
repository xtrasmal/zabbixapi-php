<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Api\Requests\Enums;

/**
 * Return only problems with the given type. Refer to the problem event object page for a list of supported event types. Possible values: 0 - event created by a trigger; 3 - internal event; 4 - event created on service status update. Default: 0 - problem created by a trigger.
 */
enum ProblemSource: int
{
    case ProblemCreatedByATrigger = 0;
    case InternalEvent = 3;
    case EventCreatedOnServiceStatus = 4;
}
