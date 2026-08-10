<?php declare(strict_types=1);

namespace IntelliTrend\Zabbix\Requests\Enums;

/**
 * Type of maintenance. Possible values: 0 - (default) with data collection; 1 - without data collection.
 */
enum MaintenanceType: int
{
    case WithDataCollection = 0;
    case WithoutDataCollection = 1;
}
