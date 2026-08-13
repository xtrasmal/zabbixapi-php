<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Api\Requests\Enums;

/**
 * selectDServices enum.
 */
enum SelectDServices: string
{
    case Extend = 'extend';
    case Count = 'count';
}
