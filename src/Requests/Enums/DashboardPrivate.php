<?php declare(strict_types=1);

namespace IntelliTrend\Zabbix\Requests\Enums;

/**
 * Type of dashboard sharing. 0 - public dashboard; 1 - (default) private dashboard.
 */
enum DashboardPrivate: int
{
    case PublicDashboard = 0;
    case PrivateDashboard = 1;
}
