<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Api\Requests\Enums;

/**
 * Whether access to new UI elements is enabled. Possible values: 0 - disabled; 1 - (default) enabled.
 */
enum UiDefaultAccess: int
{
    case Disabled = 0;
    case Enabled = 1;
}
