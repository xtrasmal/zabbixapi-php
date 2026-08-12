<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Requests\Enums;

/**
 * selectRights enum.
 */
enum SelectRights: string
{
    case Extend = 'extend';
    case Count = 'count';
}
