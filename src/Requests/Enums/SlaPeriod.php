<?php declare(strict_types=1);

namespace Idiot\Zabbix\Requests\Enums;

/**
 * Reporting period of the SLA. Possible values: 0 - daily; 1 - weekly; 2 - monthly; 3 - quarterly; 4 - annually.
 */
enum SlaPeriod: int
{
    case Daily = 0;
    case Weekly = 1;
    case Monthly = 2;
    case Quarterly = 3;
    case Annually = 4;
}
