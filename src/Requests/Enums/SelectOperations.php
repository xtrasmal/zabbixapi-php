<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Requests\Enums;

/**
 * selectOperations enum.
 */
enum SelectOperations: string
{
    case Extend = 'extend';
    case Count = 'count';
}
