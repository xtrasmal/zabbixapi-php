<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Requests\Enums;

/**
 * selectPages enum.
 */
enum SelectPages: string
{
    case Extend = 'extend';
    case Count = 'count';
}
