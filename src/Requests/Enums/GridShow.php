<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Requests\Enums;

/**
 * Whether to show the grid on the map. Possible values: 0 - do not show the grid; 1 - (default) show the grid.
 */
enum GridShow: int
{
    case DoNotShowTheGrid = 0;
    case ShowTheGrid = 1;
}
