<?php declare(strict_types=1);

namespace IntelliTrend\Zabbix\Requests\Enums;

/**
 * Blinking for unacknowledged PROBLEM events. Possible values: 0 - Do not show blinking; 1 - (default) Show blinking.
 */
enum ProblemUnackStyle: int
{
    case DoNotShowBlinking = 0;
    case ShowBlinking = 1;
}
