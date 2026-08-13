<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Api\Requests\Enums;

/**
 * Type of the lines. Possible values: 0 - none; 1 - solid line; 2 - dotted line; 3 - dashed line. Default: 0.
 */
enum LineType: int
{
    case None = 0;
    case SolidLine = 1;
    case DottedLine = 2;
    case DashedLine = 3;
}
