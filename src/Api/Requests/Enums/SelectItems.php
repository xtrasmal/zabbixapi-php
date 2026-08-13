<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Api\Requests\Enums;

/**
 * selectItems enum.
 */
enum SelectItems: string
{
    case Extend = 'extend';
    case Count = 'count';
}
