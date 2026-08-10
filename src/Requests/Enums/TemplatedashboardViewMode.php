<?php declare(strict_types=1);

namespace IntelliTrend\Zabbix\Requests\Enums;

/**
 * The widget view mode. Possible values: 0 - (default) default widget view; 1 - with hidden header.
 */
enum TemplatedashboardViewMode: int
{
    case DefaultWidgetView = 0;
    case WithHiddenHeader = 1;
}
