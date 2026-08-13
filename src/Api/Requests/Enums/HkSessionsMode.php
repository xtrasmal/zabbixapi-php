<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Api\Requests\Enums;

/**
 * Enable internal housekeeping for sessions. Possible values: 0 - Disable; 1 - (default) Enable.
 */
enum HkSessionsMode: int
{
    case Disable = 0;
    case Enable = 1;
}
