<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Requests\Enums;

/**
 * selectGroupLinks enum.
 */
enum SelectGroupLinks: string
{
    case Extend = 'extend';
    case Count = 'count';
}
