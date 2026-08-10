<?php declare(strict_types=1);

namespace IntelliTrend\Zabbix\Requests\Enums;

/**
 * Read-only access to services. Possible values: 0 - read-only access to the services, specified by the services.read.list or matched by the services.read.tag properties; 1 - (default) read-only access to all services.
 */
enum ServicesReadMode: int
{
    case ReadOnlyAccessToThe = 0;
    case ReadOnlyAccessToAll = 1;
}
