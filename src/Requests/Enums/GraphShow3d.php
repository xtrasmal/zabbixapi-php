<?php declare(strict_types=1);

namespace IntelliTrend\Zabbix\Requests\Enums;

/**
 * Whether to show pie and exploded graphs in 3D. Possible values: 0 - (default) show in 2D; 1 - show in 3D.
 */
enum GraphShow3d: int
{
    case ShowIn2d = 0;
    case ShowIn3d = 1;
}
