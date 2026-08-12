<?php declare(strict_types=1);

namespace Idiot\Zabbix\Requests\Enums;

/**
 * Read-write access to services. Possible values: 0 - (default) read-write access to the services, specified by the services.write.list or matched by the services.write.tag properties; 1 - read-write access to all services.
 */
enum ServicesWriteMode: int
{
    case ReadWriteAccessToThe = 0;
    case ReadWriteAccessToAll = 1;
}
