<?php declare(strict_types=1);

namespace IntelliTrend\Zabbix\Requests\Enums;

/**
 * OK event generation mode.  Possible values: 0 - (default) Expression; 1 - Recovery expression; 2 - None.
 */
enum TriggerRecoveryMode: int
{
    case Expression = 0;
    case RecoveryExpression = 1;
    case None = 2;
}
