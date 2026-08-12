<?php declare(strict_types=1);

namespace Idiot\Zabbix\Requests\Enums;

/**
 * Enable internal housekeeping for events and alerts. Possible values: 0 - Disable; 1 - (default) Enable.
 */
enum HkEventsMode: int
{
    case Disable = 0;
    case Enable = 1;
}
