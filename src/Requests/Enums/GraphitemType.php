<?php declare(strict_types=1);

namespace Idiot\Zabbix\Requests\Enums;

/**
 * Return only graph items with the given type. Refer to the graph item object page for a list of supported graph item types. Possible values: 0 - (default) simple; 2 - graph sum, used only by pie and exploded graphs.
 */
enum GraphitemType: int
{
    case Simple = 0;
    case GraphSum = 2;
}
