<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Api\Requests\Enums;

/**
 * Allow manual close.  Possible values: 0 - (default) No; 1 - Yes.
 */
enum TriggerManualClose: int
{
    case No = 0;
    case Yes = 1;
}
