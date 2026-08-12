<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Requests\Enums;

/**
 * Default page display period (in seconds). Possible values: 10, 30, 60, 120, 600, 1800, 3600. Default: 30.
 */
enum TemplatedashboardDisplayPeriod: int
{
    case V10 = 10;
    case V30 = 30;
    case V60 = 60;
    case V120 = 120;
    case V600 = 600;
    case V1800 = 1800;
    case V3600 = 3600;
}
