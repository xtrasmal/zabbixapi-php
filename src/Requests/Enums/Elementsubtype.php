<?php declare(strict_types=1);

namespace IntelliTrend\Zabbix\Requests\Enums;

/**
 * How a host group element should be displayed on a map. Possible values: 0 - (default) display the host group as a single element; 1 - display each host in the group separately.
 */
enum Elementsubtype: int
{
    case DisplayTheHostGroupAs = 0;
    case DisplayEachHostInThe = 1;
}
