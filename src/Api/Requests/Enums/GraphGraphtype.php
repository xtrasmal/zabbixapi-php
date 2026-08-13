<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Api\Requests\Enums;

/**
 * Graph's layout type. Possible values: 0 - (default) normal; 1 - stacked; 2 - pie; 3 - exploded.
 */
enum GraphGraphtype: int
{
    case Normal = 0;
    case Stacked = 1;
    case Pie = 2;
    case Exploded = 3;
}
