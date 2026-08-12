<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Requests\Enums;

/**
 * Show warning if Zabbix server is down. Possible values: 0 - Do not show warning; 10 - (default) Show warning.
 */
enum ServerCheckInterval: int
{
    case DoNotShowWarning = 0;
    case ShowWarning = 10;
}
