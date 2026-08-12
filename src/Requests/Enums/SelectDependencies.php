<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Requests\Enums;

/**
 * selectDependencies enum.
 */
enum SelectDependencies: string
{
    case Extend = 'extend';
    case Count = 'count';
}
