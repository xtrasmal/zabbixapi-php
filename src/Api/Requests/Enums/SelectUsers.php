<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Api\Requests\Enums;

/**
 * selectUsers enum.
 */
enum SelectUsers: string
{
    case Extend = 'extend';
    case Count = 'count';
}
