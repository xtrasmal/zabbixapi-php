<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Api\Requests\Enums;

/**
 * Mapping condition operator. Possible values: 0 - (default) Equals; 2 - Contains.
 */
enum ServiceProblemTagsOperator: int
{
    case Equals = 0;
    case Contains = 2;
}
