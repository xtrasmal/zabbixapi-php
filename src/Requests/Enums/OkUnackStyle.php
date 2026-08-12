<?php declare(strict_types=1);

namespace Idiot\Zabbix\Requests\Enums;

/**
 * Blinking for unacknowledged RESOLVED events. Possible values: 0 - Do not show blinking; 1 - (default) Show blinking.
 */
enum OkUnackStyle: int
{
    case DoNotShowBlinking = 0;
    case ShowBlinking = 1;
}
