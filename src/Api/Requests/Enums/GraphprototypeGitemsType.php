<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Api\Requests\Enums;

/**
 * Type of graph item. Possible values: 0 - (default) simple; 2 - graph sum, used only by pie and exploded graphs.
 */
enum GraphprototypeGitemsType: int
{
    case Simple = 0;
    case GraphSum = 2;
}
