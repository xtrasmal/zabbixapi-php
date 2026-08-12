<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Requests\Enums;

/**
 * User type. Possible values: 1 - (default) User; 2 - Admin; 3 - Super admin.
 */
enum RoleType: int
{
    case User = 1;
    case Admin = 2;
    case SuperAdmin = 3;
}
