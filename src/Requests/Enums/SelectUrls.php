<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Requests\Enums;

/**
 * selectUrls enum.
 */
enum SelectUrls: string
{
    case Extend = 'extend';
    case Count = 'count';
}
