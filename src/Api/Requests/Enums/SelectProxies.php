<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Api\Requests\Enums;

/**
 * selectProxies enum.
 */
enum SelectProxies: string
{
    case Extend = 'extend';
    case Count = 'count';
}
