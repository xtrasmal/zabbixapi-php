<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Requests\Enums;

/**
 * stats enum.
 */
enum TaskStats: string
{
    case Extend = 'extend';
    case Count = 'count';
}
