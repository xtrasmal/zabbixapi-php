<?php declare(strict_types=1);

namespace IntelliTrend\Zabbix\Requests\Enums;

/**
 * Limit status. Possible values: -1 - OK; 0 - Not classified; 1 - Information; 2 - Warning; 3 - Average; 4 - High; 5 - Disaster. Required.
 */
enum ServiceStatusRulesLimitStatus: int
{
    case Ok = -1;
    case NotClassified = 0;
    case Information = 1;
    case Warning = 2;
    case Average = 3;
    case High = 4;
    case Disaster = 5;
}
