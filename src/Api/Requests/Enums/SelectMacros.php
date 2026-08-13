<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Api\Requests\Enums;

/**
 * selectMacros enum.
 */
enum SelectMacros: string
{
    case Extend = 'extend';
    case Count = 'count';
}
