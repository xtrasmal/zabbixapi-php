<?php declare(strict_types=1);

namespace IntelliTrend\Zabbix\Requests\Enums;

/**
 * Return only problems created by objects of the given type. Refer to the problem event object page for a list of supported object types. Possible values if source is set to "event created by a trigger": 0 - trigger. Possible values if source is set to "internal event": 0 - trigger; 4 - item; 5 - LLD rule. Possible values if source is set to "event created on service status update": 6 - service. Default: 0 - trigger.
 */
enum ProblemObject: int
{
    case Trigger = 0;
    case Item = 4;
    case LldRule = 5;
    case Service = 6;
}
