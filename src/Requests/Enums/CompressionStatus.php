<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Requests\Enums;

/**
 * Enable TimescaleDB compression for history and trends. Possible values: 0 - (default) Off; 1 - On.
 */
enum CompressionStatus: int
{
    case Off = 0;
    case On = 1;
}
