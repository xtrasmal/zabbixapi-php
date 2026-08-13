<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Api\Requests\Enums;

/**
 * Type of permission level. 2 - read only; 3 - read-write.
 */
enum DashboardPermission: int
{
    case ReadOnly = 2;
    case ReadWrite = 3;
}
