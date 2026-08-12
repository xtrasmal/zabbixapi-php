<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Requests\Enums;

/**
 * Type of map element for which the URL will be available. Possible values (see the map element elementtype property): 0 - host; 1 - map; 2 - trigger; 3 - host group; 4 - image. Default: 0.
 */
enum MapElementtype: int
{
    case Host = 0;
    case Map = 1;
    case Trigger = 2;
    case HostGroup = 3;
    case Image = 4;
}
