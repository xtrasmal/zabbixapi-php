<?php declare(strict_types=1);

namespace IntelliTrend\Zabbix\Requests\Enums;

/**
 * Link line draw style. Possible values: 0 - (default) line; 2 - bold line; 3 - dotted line; 4 - dashed line.
 */
enum MapDrawtype: int
{
    case Line = 0;
    case BoldLine = 2;
    case DottedLine = 3;
    case DashedLine = 4;
}
