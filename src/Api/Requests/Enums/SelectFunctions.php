<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Api\Requests\Enums;

/**
 * selectFunctions enum.
 */
enum SelectFunctions: string
{
    case Extend = 'extend';
    case Count = 'count';
}
