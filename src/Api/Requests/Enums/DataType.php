<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Api\Requests\Enums;

/**
 * Data type. Possible values: 0 - (default) Item values; 1 - Events.
 */
enum DataType: int
{
    case ItemValues = 0;
    case Events = 1;
}
