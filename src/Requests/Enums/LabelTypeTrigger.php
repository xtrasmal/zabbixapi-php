<?php declare(strict_types=1);

namespace Idiot\Zabbix\Requests\Enums;

/**
 * Label type for trigger elements. Possible values: 0 - label; 2 - (default) element name; 3 - status only; 4 - nothing; 5 - custom.
 */
enum LabelTypeTrigger: int
{
    case Label = 0;
    case ElementName = 2;
    case StatusOnly = 3;
    case Nothing = 4;
    case Custom = 5;
}
