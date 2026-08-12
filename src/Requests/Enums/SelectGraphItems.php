<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Requests\Enums;

/**
 * selectGraphItems enum.
 */
enum SelectGraphItems: string
{
    case Extend = 'extend';
    case Count = 'count';
}
