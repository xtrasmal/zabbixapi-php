<?php declare(strict_types=1);

namespace IntelliTrend\Zabbix\Requests\Enums;

/**
 * Blinking for acknowledged RESOLVED events. Possible values: 0 - Do not show blinking; 1 - (default) Show blinking.
 */
enum OkAckStyle: int
{
    case DoNotShowBlinking = 0;
    case ShowBlinking = 1;
}
