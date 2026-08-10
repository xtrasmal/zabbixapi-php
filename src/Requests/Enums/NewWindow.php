<?php declare(strict_types=1);

namespace IntelliTrend\Zabbix\Requests\Enums;

/**
 * Open URL in a new window. Supported if type is set to "URL". Possible values: 0 - No; 1 - (default) Yes.
 */
enum NewWindow: int
{
    case No = 0;
    case Yes = 1;
}
