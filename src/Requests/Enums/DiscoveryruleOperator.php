<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Requests\Enums;

/**
 * Override condition operator. Possible values: 0 - (default) equals; 1 - does not equal; 2 - contains; 3 - does not contain; 8 - matches; 9 - does not match.
 */
enum DiscoveryruleOperator: int
{
    case Equals = 0;
    case DoesNotEqual = 1;
    case Contains = 2;
    case DoesNotContain = 3;
    case Matches = 8;
    case DoesNotMatch = 9;
}
