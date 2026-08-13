<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Api\Requests\Enums;

/**
 * selectAssignedHosts enum.
 */
enum SelectAssignedHosts: string
{
    case Extend = 'extend';
    case Count = 'count';
}
