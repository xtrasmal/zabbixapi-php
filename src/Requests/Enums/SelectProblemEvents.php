<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Requests\Enums;

/**
 * selectProblemEvents enum.
 */
enum SelectProblemEvents: string
{
    case Extend = 'extend';
    case Count = 'count';
}
