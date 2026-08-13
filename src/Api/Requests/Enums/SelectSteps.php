<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Api\Requests\Enums;

/**
 * selectSteps enum.
 */
enum SelectSteps: string
{
    case Extend = 'extend';
    case Count = 'count';
}
