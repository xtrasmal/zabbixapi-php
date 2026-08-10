<?php declare(strict_types=1);

namespace IntelliTrend\Zabbix\Requests\Enums;

/**
 * Access level to the host group or template group. Possible values: 0 - access denied; 2 - read-only access; 3 - read-write access.
 */
enum UsergroupPermission: int
{
    case AccessDenied = 0;
    case ReadOnlyAccess = 2;
    case ReadWriteAccess = 3;
}
