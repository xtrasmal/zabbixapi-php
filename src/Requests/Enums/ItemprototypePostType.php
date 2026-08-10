<?php declare(strict_types=1);

namespace IntelliTrend\Zabbix\Requests\Enums;

/**
 * Type of post data body stored in posts property. Possible values: 0 - (default) Raw data. 2 - JSON data. 3 - XML data. Property behavior: supported if type is set to "HTTP agent"; read-only for inherited objects.
 */
enum ItemprototypePostType: int
{
    case RawData = 0;
    case JsonData = 2;
    case XmlData = 3;
}
