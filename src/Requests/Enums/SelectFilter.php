<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Requests\Enums;

/**
 * selectFilter enum.
 */
enum SelectFilter: string
{
    case Extend = 'extend';
    case Count = 'count';
}
