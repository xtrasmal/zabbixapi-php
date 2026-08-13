<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Api\Requests\Enums;

/**
 * selectValueMaps enum.
 */
enum SelectValueMaps: string
{
    case Extend = 'extend';
    case Count = 'count';
}
