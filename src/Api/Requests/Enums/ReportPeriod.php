<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Api\Requests\Enums;

/**
 * Period for which the report will be prepared. Possible values: 0 - (default) previous day; 1 - previous week; 2 - previous month; 3 - previous year.
 */
enum ReportPeriod: int
{
    case PreviousDay = 0;
    case PreviousWeek = 1;
    case PreviousMonth = 2;
    case PreviousYear = 3;
}
