<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Api\Requests\Enums;

/**
 * Whether the connector is enabled. Possible values: 0 - Disabled; 1 - (default) Enabled.
 */
enum ConnectorStatus: int
{
    case Disabled = 0;
    case Enabled = 1;
}
