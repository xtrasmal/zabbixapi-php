<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Api\Requests\Enums;

/**
 * Minimum value calculation method for the Y axis. Possible values: 0 - (default) calculated; 1 - fixed; 2 - item.
 */
enum YminType: int
{
    case Calculated = 0;
    case Fixed = 1;
    case Item = 2;
}
