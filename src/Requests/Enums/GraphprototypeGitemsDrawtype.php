<?php declare(strict_types=1);

namespace IntelliTrend\Zabbix\Requests\Enums;

/**
 * Draw style of the graph item. Possible values: 0 - (default) line; 1 - filled region; 2 - bold line; 3 - dot; 4 - dashed line; 5 - gradient line.
 */
enum GraphprototypeGitemsDrawtype: int
{
    case Line = 0;
    case FilledRegion = 1;
    case BoldLine = 2;
    case Dot = 3;
    case DashedLine = 4;
    case GradientLine = 5;
}
