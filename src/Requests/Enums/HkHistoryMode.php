<?php declare(strict_types=1);

namespace Idiot\Zabbix\Requests\Enums;

/**
 * Enable internal housekeeping for history. Possible values: 0 - Disable; 1 - (default) Enable.
 */
enum HkHistoryMode: int
{
    case Disable = 0;
    case Enable = 1;
}
