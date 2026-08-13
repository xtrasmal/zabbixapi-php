<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Api\Requests\Enums;

/**
 * Type of widget field. 0 - Integer; 1 - String; 2 - Host group; 3 - Host; 4 - Item; 5 - Item prototype; 6 - Graph; 7 - Graph prototype; 8 - Map; 9 - Service; 10 - SLA; 11 - User; 12 - Action; 13 - Media type.
 */
enum DashboardType: int
{
    case Integer = 0;
    case String = 1;
    case HostGroup = 2;
    case Host = 3;
    case Item = 4;
    case ItemPrototype = 5;
    case Graph = 6;
    case GraphPrototype = 7;
    case Map = 8;
    case Service = 9;
    case Sla = 10;
    case User = 11;
    case Action = 12;
    case MediaType = 13;
}
