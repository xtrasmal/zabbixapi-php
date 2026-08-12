<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Requests\Enums;

/**
 * selectLinks enum.
 */
enum SelectLinks: string
{
    case Extend = 'extend';
    case Count = 'count';
}
