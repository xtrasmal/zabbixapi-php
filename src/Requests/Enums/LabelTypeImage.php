<?php declare(strict_types=1);

namespace IntelliTrend\Zabbix\Requests\Enums;

/**
 * Label type for image elements. Possible values: 0 - label; 2 - (default) element name; 4 - nothing; 5 - custom.
 */
enum LabelTypeImage: int
{
    case Label = 0;
    case ElementName = 2;
    case Nothing = 4;
    case Custom = 5;
}
