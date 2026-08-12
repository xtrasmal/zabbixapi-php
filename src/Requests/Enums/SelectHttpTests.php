<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Requests\Enums;

/**
 * selectHttpTests enum.
 */
enum SelectHttpTests: string
{
    case Extend = 'extend';
    case Count = 'count';
}
