<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Requests\Enums;

/**
 * Allow manual close. Possible values: 0 - (default) No; 1 - Yes.
 */
enum TriggerprototypeManualClose: int
{
    case No = 0;
    case Yes = 1;
}
