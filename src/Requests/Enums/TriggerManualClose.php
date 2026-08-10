<?php declare(strict_types=1);

namespace IntelliTrend\Zabbix\Requests\Enums;

/**
 * Allow manual close.  Possible values: 0 - (default) No; 1 - Yes.
 */
enum TriggerManualClose: int
{
    case No = 0;
    case Yes = 1;
}
