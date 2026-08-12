<?php declare(strict_types=1);

namespace Idiot\Zabbix\Requests\Enums;

/**
 * Status propagation value. Possible values if propagation_rule is set to "0" or "3": 0 - Not classified. Possible values if propagation_rule is set to "1" or "2": 1 - Information; 2 - Warning; 3 - Average; 4 - High; 5 - Disaster. Possible values if propagation_rule is set to "4": -1 - OK; 0 - Not classified; 1 - Information; 2 - Warning; 3 - Average; 4 - High; 5 - Disaster. Required if propagation_rule is set.
 */
enum PropagationValue: int
{
    case Ok = -1;
    case NotClassified = 0;
    case Information = 1;
    case Warning = 2;
    case Average = 3;
    case High = 4;
    case Disaster = 5;
}
