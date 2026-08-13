<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Api\Requests\Enums;

/**
 * selectSelements enum.
 */
enum SelectSelements: string
{
    case Extend = 'extend';
    case Count = 'count';
}
