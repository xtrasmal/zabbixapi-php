<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Requests\Enums;

/**
 * selectExpressions enum.
 */
enum SelectExpressions: string
{
    case Extend = 'extend';
    case Count = 'count';
}
