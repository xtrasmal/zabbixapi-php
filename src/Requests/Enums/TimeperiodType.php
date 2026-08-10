<?php declare(strict_types=1);

namespace IntelliTrend\Zabbix\Requests\Enums;

/**
 * Type of time period. Possible values: 0 - (default) one time only; 2 - daily; 3 - weekly; 4 - monthly.
 */
enum TimeperiodType: int
{
    case OneTimeOnly = 0;
    case Daily = 2;
    case Weekly = 3;
    case Monthly = 4;
}
