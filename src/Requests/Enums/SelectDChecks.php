<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Requests\Enums;

/**
 * selectDChecks enum.
 */
enum SelectDChecks: string
{
    case Extend = 'extend';
    case Count = 'count';
}
