<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Requests\Enums;

/**
 * selectGraphs enum.
 */
enum SelectGraphs: string
{
    case Extend = 'extend';
    case Count = 'count';
}
