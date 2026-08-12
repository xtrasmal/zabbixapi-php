<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Requests\Enums;

/**
 * selectFunctions enum.
 */
enum SelectFunctions: string
{
    case Extend = 'extend';
    case Count = 'count';
}
