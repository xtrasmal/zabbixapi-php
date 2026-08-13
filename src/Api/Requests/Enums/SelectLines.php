<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Api\Requests\Enums;

/**
 * selectLines enum.
 */
enum SelectLines: string
{
    case Extend = 'extend';
    case Count = 'count';
}
