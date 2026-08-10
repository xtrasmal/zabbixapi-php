<?php declare(strict_types=1);

namespace IntelliTrend\Zabbix\Requests\Enums;

/**
 * How separate host group hosts should be displayed. Possible values: 0 - (default) the host group element will take up the whole map; 1 - the host group element will have a fixed size.
 */
enum Areatype: int
{
    case TheHostGroupElementWill = 0;
    case TheHostGroupElementWill2 = 1;
}
