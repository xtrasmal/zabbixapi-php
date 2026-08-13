<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Api\Requests\Enums;

/**
 * selectUrls enum.
 */
enum SelectUrls: string
{
    case Extend = 'extend';
    case Count = 'count';
}
