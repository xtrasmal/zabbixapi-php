<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Requests\Enums;

/**
 * selectTriggers enum.
 */
enum SelectTriggers: string
{
    case Extend = 'extend';
    case Count = 'count';
}
