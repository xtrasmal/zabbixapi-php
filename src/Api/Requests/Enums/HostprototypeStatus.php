<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Api\Requests\Enums;

/**
 * Status of the host prototype. Possible values: 0 - (default) monitored host; 1 - unmonitored host.
 */
enum HostprototypeStatus: int
{
    case MonitoredHost = 0;
    case UnmonitoredHost = 1;
}
