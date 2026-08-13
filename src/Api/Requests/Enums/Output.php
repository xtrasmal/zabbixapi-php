<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Api\Requests\Enums;

/**
 * output enum.
 */
enum Output: string
{
    case Extend = 'extend';
    case Count = 'count';
}
