<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Requests\Enums;

/**
 * selectRecoveryOperations enum.
 */
enum SelectRecoveryOperations: string
{
    case Extend = 'extend';
    case Count = 'count';
}
