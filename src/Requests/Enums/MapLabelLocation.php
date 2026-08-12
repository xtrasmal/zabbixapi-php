<?php declare(strict_types=1);

namespace Idiot\Zabbix\Requests\Enums;

/**
 * Location of the map element label. Possible values: -1 - (default) default location; 0 - bottom; 1 - left; 2 - right; 3 - top.
 */
enum MapLabelLocation: int
{
    case DefaultLocation = -1;
    case Bottom = 0;
    case Left = 1;
    case Right = 2;
    case Top = 3;
}
