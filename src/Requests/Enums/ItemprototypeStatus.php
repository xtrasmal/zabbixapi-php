<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Requests\Enums;

/**
 * Status of the item prototype. Possible values: 0 - (default) enabled item prototype; 1 - disabled item prototype; 3 - unsupported item prototype.
 */
enum ItemprototypeStatus: int
{
    case EnabledItemPrototype = 0;
    case DisabledItemPrototype = 1;
    case UnsupportedItemPrototype = 3;
}
