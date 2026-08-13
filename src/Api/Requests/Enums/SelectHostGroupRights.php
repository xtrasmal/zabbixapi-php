<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Api\Requests\Enums;

/**
 * selectHostGroupRights enum.
 */
enum SelectHostGroupRights: string
{
    case Extend = 'extend';
    case Count = 'count';
}
