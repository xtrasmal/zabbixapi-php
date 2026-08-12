<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Requests\Enums;

/**
 * selectSchedule enum.
 */
enum SelectSchedule: string
{
    case Extend = 'extend';
    case Count = 'count';
}
