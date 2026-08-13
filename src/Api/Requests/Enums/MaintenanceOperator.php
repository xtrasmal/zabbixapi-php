<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Api\Requests\Enums;

/**
 * Condition operator. Possible values: 0 - Equals; 2 - (default) Contains.
 */
enum MaintenanceOperator: int
{
    case Equals = 0;
    case Contains = 2;
}
