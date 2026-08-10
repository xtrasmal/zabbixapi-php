<?php declare(strict_types=1);

namespace IntelliTrend\Zabbix\Requests\Enums;

/**
 * Status of the item.  Possible values: 0 - (default) enabled item; 1 - disabled item.
 */
enum ItemStatus: int
{
    case EnabledItem = 0;
    case DisabledItem = 1;
}
