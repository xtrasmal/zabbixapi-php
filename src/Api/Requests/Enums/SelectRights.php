<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Api\Requests\Enums;

/**
 * selectRights enum.
 */
enum SelectRights: string
{
    case Extend = 'extend';
    case Count = 'count';
}
