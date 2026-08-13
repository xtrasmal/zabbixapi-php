<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Api\Requests\Enums;

/**
 * SLA service tag operator. Possible values: 0 - (default) Equals; 2 - Contains.
 */
enum SlaOperator: int
{
    case Equals = 0;
    case Contains = 2;
}
