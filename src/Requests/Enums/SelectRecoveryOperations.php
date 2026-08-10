<?php declare(strict_types=1);

namespace IntelliTrend\Zabbix\Requests\Enums;

/**
 * selectRecoveryOperations enum.
 */
enum SelectRecoveryOperations: string
{
    case Extend = 'extend';
    case Count = 'count';
}
