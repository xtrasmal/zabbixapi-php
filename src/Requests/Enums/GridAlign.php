<?php declare(strict_types=1);

namespace Idiot\Zabbix\Requests\Enums;

/**
 * Whether to enable grid aligning. Possible values: 0 - disable grid aligning; 1 - (default) enable grid aligning.
 */
enum GridAlign: int
{
    case DisableGridAligning = 0;
    case EnableGridAligning = 1;
}
