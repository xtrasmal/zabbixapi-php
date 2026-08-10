<?php declare(strict_types=1);

namespace IntelliTrend\Zabbix\Requests\Enums;

/**
 * Condition operator. Possible values: 0 - (default) Equals; 1 - Does not equal; 2 - Contains; 3 - Does not contain; 12 - Exists; 13 - Does not exist.
 */
enum ConnectorTagsOperator: int
{
    case Equals = 0;
    case DoesNotEqual = 1;
    case Contains = 2;
    case DoesNotContain = 3;
    case Exists = 12;
    case DoesNotExist = 13;
}
