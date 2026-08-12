<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Requests\Enums;

/**
 * Source that is used to monitor the host. Possible values: 0 - (default) Zabbix server; 1 - Proxy; 2 - Proxy group.
 */
enum MonitoredBy: int
{
    case ZabbixServer = 0;
    case Proxy = 1;
    case ProxyGroup = 2;
}
