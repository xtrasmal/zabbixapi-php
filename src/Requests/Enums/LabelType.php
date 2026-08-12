<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Requests\Enums;

/**
 * Map element label type. Possible values: 0 - label; 1 - IP address; 2 - (default) element name; 3 - status only; 4 - nothing.
 */
enum LabelType: int
{
    case Label = 0;
    case IpAddress = 1;
    case ElementName = 2;
    case StatusOnly = 3;
    case Nothing = 4;
}
