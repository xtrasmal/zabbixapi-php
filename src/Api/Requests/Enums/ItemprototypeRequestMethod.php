<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Api\Requests\Enums;

/**
 * Type of request method. Possible values: 0 - (default) GET; 1 - POST; 2 - PUT; 3 - HEAD. Property behavior: supported if type is set to "HTTP agent"; read-only for inherited objects.
 */
enum ItemprototypeRequestMethod: int
{
    case Get = 0;
    case Post = 1;
    case Put = 2;
    case Head = 3;
}
