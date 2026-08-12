<?php declare(strict_types=1);

namespace Idiot\Zabbix\Requests\Enums;

/**
 * Whether icon mapping must be used for host elements. Possible values: 0 - do not use icon mapping; 1 - (default) use icon mapping.
 */
enum UseIconmap: int
{
    case DoNotUseIconMapping = 0;
    case UseIconMapping = 1;
}
