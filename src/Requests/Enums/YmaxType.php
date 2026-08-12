<?php declare(strict_types=1);

namespace Idiot\Zabbix\Requests\Enums;

/**
 * Maximum value calculation method for the Y axis. Possible values: 0 - (default) calculated; 1 - fixed; 2 - item.
 */
enum YmaxType: int
{
    case Calculated = 0;
    case Fixed = 1;
    case Item = 2;
}
