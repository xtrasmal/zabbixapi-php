<?php declare(strict_types=1);

namespace Idiot\Zabbix\Requests\Enums;

/**
 * selectHostGroupRights enum.
 */
enum SelectHostGroupRights: string
{
    case Extend = 'extend';
    case Count = 'count';
}
