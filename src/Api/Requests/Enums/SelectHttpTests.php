<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Api\Requests\Enums;

/**
 * selectHttpTests enum.
 */
enum SelectHttpTests: string
{
    case Extend = 'extend';
    case Count = 'count';
}
