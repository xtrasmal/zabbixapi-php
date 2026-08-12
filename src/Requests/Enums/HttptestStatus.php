<?php declare(strict_types=1);

namespace Idiot\Zabbix\Requests\Enums;

/**
 * Whether the web scenario is enabled. Possible values: 0 - (default) enabled; 1 - disabled.
 */
enum HttptestStatus: int
{
    case Enabled = 0;
    case Disabled = 1;
}
