<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Api\Requests\Enums;

/**
 * selectGraphItems enum.
 */
enum SelectGraphItems: string
{
    case Extend = 'extend';
    case Count = 'count';
}
