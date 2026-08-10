<?php declare(strict_types=1);

namespace IntelliTrend\Zabbix\Requests\Enums;

/**
 * Type of map sharing. Possible values: 0 - public map; 1 - (default) private map.
 */
enum MapPrivate: int
{
    case PublicMap = 0;
    case PrivateMap = 1;
}
