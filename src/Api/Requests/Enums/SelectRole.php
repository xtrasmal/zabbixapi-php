<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Api\Requests\Enums;

/**
 * selectRole enum.
 */
enum SelectRole: string
{
    case Extend = 'extend';
    case Count = 'count';
}
