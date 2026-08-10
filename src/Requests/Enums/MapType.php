<?php declare(strict_types=1);

namespace IntelliTrend\Zabbix\Requests\Enums;

/**
 * Type of map shape element. Possible values: 0 - rectangle; 1 - ellipse. Property is required when new shapes are created. Parameter behavior: required.
 */
enum MapType: int
{
    case Rectangle = 0;
    case Ellipse = 1;
}
