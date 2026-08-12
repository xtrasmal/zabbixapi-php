<?php declare(strict_types=1);

namespace Idiot\Zabbix\Requests\Enums;

/**
 * Blinking for acknowledged PROBLEM events. Possible values: 0 - Do not show blinking; 1 - (default) Show blinking.
 */
enum ProblemAckStyle: int
{
    case DoNotShowBlinking = 0;
    case ShowBlinking = 1;
}
