<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Api\Requests\Enums;

/**
 * Whether to show the legend on the graph. Possible values: 0 - hide; 1 - (default) show.
 */
enum GraphShowLegend: int
{
    case Hide = 0;
    case Show = 1;
}
