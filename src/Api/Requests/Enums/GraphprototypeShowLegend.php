<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Api\Requests\Enums;

/**
 * Whether to show the legend on the discovered graph. Possible values: 0 - hide; 1 - (default) show.
 */
enum GraphprototypeShowLegend: int
{
    case Hide = 0;
    case Show = 1;
}
