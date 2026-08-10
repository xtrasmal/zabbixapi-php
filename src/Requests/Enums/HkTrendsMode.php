<?php declare(strict_types=1);

namespace IntelliTrend\Zabbix\Requests\Enums;

/**
 * Enable internal housekeeping for trends. Possible values: 0 - Disable; 1 - (default) Enable.
 */
enum HkTrendsMode: int
{
    case Disable = 0;
    case Enable = 1;
}
