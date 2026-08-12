<?php declare(strict_types=1);

namespace Idiot\Zabbix\Requests\Enums;

/**
 * Condition operator. Possible values: 0 - (default) equals; 1 - does not equal; 2 - contains; 3 - does not contain; 4 - in; 5 - is greater than or equals; 6 - is less than or equals; 7 - not in; 8 - matches; 9 - does not match; 10 - Yes; 11 - No.
 */
enum ActionOperator: int
{
    case Equals = 0;
    case DoesNotEqual = 1;
    case Contains = 2;
    case DoesNotContain = 3;
    case In = 4;
    case IsGreaterThanOrEquals = 5;
    case IsLessThanOrEquals = 6;
    case NotIn = 7;
    case Matches = 8;
    case DoesNotMatch = 9;
    case Yes = 10;
    case No = 11;
}
