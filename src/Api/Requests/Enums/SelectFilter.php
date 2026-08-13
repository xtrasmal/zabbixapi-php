<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Api\Requests\Enums;

/**
 * selectFilter enum.
 */
enum SelectFilter: string
{
    case Extend = 'extend';
    case Count = 'count';
}
