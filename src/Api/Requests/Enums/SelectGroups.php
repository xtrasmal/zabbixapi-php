<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Api\Requests\Enums;

/**
 * selectGroups enum.
 */
enum SelectGroups: string
{
    case Extend = 'extend';
    case Count = 'count';
}
