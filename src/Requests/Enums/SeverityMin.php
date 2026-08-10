<?php declare(strict_types=1);

namespace IntelliTrend\Zabbix\Requests\Enums;

/**
 * Minimum severity of the triggers that will be displayed on the map. Same values as the trigger object's priority (severity) property: 0 - not classified; 1 - information; 2 - warning; 3 - average; 4 - high; 5 - disaster.
 */
enum SeverityMin: int
{
    case NotClassified = 0;
    case Information = 1;
    case Warning = 2;
    case Average = 3;
    case High = 4;
    case Disaster = 5;
}
