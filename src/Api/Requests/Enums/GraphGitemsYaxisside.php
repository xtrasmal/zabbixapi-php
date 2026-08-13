<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Api\Requests\Enums;

/**
 * Side of the graph where the graph item's Y scale will be drawn. Possible values: 0 - (default) left side; 1 - right side.
 */
enum GraphGitemsYaxisside: int
{
    case LeftSide = 0;
    case RightSide = 1;
}
