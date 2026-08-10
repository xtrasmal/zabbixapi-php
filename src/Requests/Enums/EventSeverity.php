<?php declare(strict_types=1);

namespace IntelliTrend\Zabbix\Requests\Enums;

/**
 * New severity for events. Possible values: 0 - not classified; 1 - information; 2 - warning; 3 - average; 4 - high; 5 - disaster. Required if action contains the "change severity" bit.
 */
enum EventSeverity: int
{
    case NotClassified = 0;
    case Information = 1;
    case Warning = 2;
    case Average = 3;
    case High = 4;
    case Disaster = 5;
}
