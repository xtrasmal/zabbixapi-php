<?php declare(strict_types=1);

namespace IntelliTrend\Zabbix\Requests\Enums;

/**
 * Should the response be converted to JSON.  0 - (default) Store raw; 1 - Convert to JSON.  Property behavior: - supported if type is set to "HTTP agent" - read-only for inherited objects or discovered objects
 */
enum ItemOutputFormat: int
{
    case StoreRaw = 0;
    case ConvertToJson = 1;
}
