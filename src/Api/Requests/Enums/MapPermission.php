<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Api\Requests\Enums;

/**
 * Type of permission level. Possible values: 2 - read only; 3 - read-write. Parameter behavior: required.
 */
enum MapPermission: int
{
    case ReadOnly = 2;
    case ReadWrite = 3;
}
