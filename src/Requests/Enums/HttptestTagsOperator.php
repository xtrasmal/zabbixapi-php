<?php declare(strict_types=1);

namespace IntelliTrend\Zabbix\Requests\Enums;

/**
 * Possible values: 0 - (default) Contains; 1 - Equals; 2 - Does not contain; 3 - Does not equal; 4 - Exists; 5 - Does not exist.
 */
enum HttptestTagsOperator: int
{
    case Contains = 0;
    case Equals = 1;
    case DoesNotContain = 2;
    case DoesNotEqual = 3;
    case Exists = 4;
    case DoesNotExist = 5;
}
