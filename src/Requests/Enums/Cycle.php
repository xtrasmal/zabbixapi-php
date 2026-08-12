<?php declare(strict_types=1);

namespace Idiot\Zabbix\Requests\Enums;

/**
 * Period repeating schedule. Possible values: 0 - (default) daily; 1 - weekly; 2 - monthly; 3 - yearly.
 */
enum Cycle: int
{
    case Daily = 0;
    case Weekly = 1;
    case Monthly = 2;
    case Yearly = 3;
}
