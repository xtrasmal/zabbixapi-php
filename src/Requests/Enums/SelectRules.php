<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Requests\Enums;

/**
 * selectRules enum.
 */
enum SelectRules: string
{
    case Extend = 'extend';
    case Count = 'count';
}
