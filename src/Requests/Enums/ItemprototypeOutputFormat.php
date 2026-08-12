<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Requests\Enums;

/**
 * Should the response be converted to JSON. Possible values: 0 - (default) Store raw; 1 - Convert to JSON. Property behavior: supported if type is set to "HTTP agent"; read-only for inherited objects.
 */
enum ItemprototypeOutputFormat: int
{
    case StoreRaw = 0;
    case ConvertToJson = 1;
}
