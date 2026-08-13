<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Api\Requests\Enums;

/**
 * selectUserGroups enum.
 */
enum SelectUserGroups: string
{
    case Extend = 'extend';
    case Count = 'count';
}
