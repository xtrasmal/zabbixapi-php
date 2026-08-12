<?php declare(strict_types=1);

namespace Idiot\Zabbix\Requests\Enums;

/**
 * Status and function of the host. Possible values: 0 - (default) enabled; 1 - disabled.
 */
enum HostStatus: int
{
    case Enabled = 0;
    case Disabled = 1;
}
