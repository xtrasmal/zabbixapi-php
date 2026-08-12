<?php declare(strict_types=1);

namespace Idiot\Zabbix\Requests\Enums;

/**
 * Value of the item that will be displayed. Possible values: 1 - minimum value; 2 - (default) average value; 4 - maximum value; 7 - all values; 9 - last value, used only by pie and exploded graphs.
 */
enum GraphGitemsCalcFnc: int
{
    case MinimumValue = 1;
    case AverageValue = 2;
    case MaximumValue = 4;
    case AllValues = 7;
    case LastValue = 9;
}
