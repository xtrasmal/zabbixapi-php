<?php declare(strict_types=1);

namespace IntelliTrend\Zabbix\Requests\Enums;

/**
 * Dashboard page display period (in seconds). Possible values: 0, 10, 30, 60, 120, 600, 1800, 3600. Default: 0 (uses default page display period).
 */
enum DashboardDisplayPeriod: int
{
    case V0 = 0;
    case V10 = 10;
    case V30 = 30;
    case V60 = 60;
    case V120 = 120;
    case V600 = 600;
    case V1800 = 1800;
    case V3600 = 3600;
}
