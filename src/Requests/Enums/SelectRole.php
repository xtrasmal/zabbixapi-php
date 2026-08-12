<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Requests\Enums;

/**
 * selectRole enum.
 */
enum SelectRole: string
{
    case Extend = 'extend';
    case Count = 'count';
}
