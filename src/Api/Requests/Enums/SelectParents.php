<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Api\Requests\Enums;

/**
 * selectParents enum.
 */
enum SelectParents: string
{
    case Extend = 'extend';
    case Count = 'count';
}
