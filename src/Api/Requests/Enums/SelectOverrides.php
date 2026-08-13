<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Api\Requests\Enums;

/**
 * selectOverrides enum.
 */
enum SelectOverrides: string
{
    case Extend = 'extend';
    case Count = 'count';
}
