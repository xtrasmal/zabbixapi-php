<?php declare(strict_types=1);

namespace IntelliTrend\Zabbix\Requests\Enums;

/**
 * Widget view mode. 0 - (default) default widget view; 1 - with hidden header.
 */
enum DashboardViewMode: int
{
    case DefaultWidgetView = 0;
    case WithHiddenHeader = 1;
}
