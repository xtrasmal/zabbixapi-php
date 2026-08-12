<?php declare(strict_types=1);

namespace Idiot\Zabbix\Requests\Enums;

/**
 * New status value. Possible values: 0 - Not classified; 1 - Information; 2 - Warning; 3 - Average; 4 - High; 5 - Disaster. Required.
 */
enum ServiceStatusRulesNewStatus: int
{
    case NotClassified = 0;
    case Information = 1;
    case Warning = 2;
    case Average = 3;
    case High = 4;
    case Disaster = 5;
}
