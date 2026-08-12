<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Requests\Enums;

/**
 * Use custom event status colors. Possible values: 0 - (default) Do not use custom event status colors; 1 - Use custom event status colors.
 */
enum CustomColor: int
{
    case DoNotUseCustomEvent = 0;
    case UseCustomEventStatusColors = 1;
}
