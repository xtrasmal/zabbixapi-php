<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Api\Requests\Enums;

/**
 * Whether suppressed problems are shown. Possible values: 0 - (default) hide suppressed problems; 1 - show suppressed problems.
 */
enum ShowSuppressed: int
{
    case HideSuppressedProblems = 0;
    case ShowSuppressedProblems = 1;
}
