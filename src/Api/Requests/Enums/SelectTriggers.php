<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Api\Requests\Enums;

/**
 * selectTriggers enum.
 */
enum SelectTriggers: string
{
    case Extend = 'extend';
    case Count = 'count';
}
