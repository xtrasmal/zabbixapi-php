<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Requests\Enums;

/**
 * selectUsers enum.
 */
enum SelectUsers: string
{
    case Extend = 'extend';
    case Count = 'count';
}
