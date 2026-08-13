<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Api\Requests\Enums;

/**
 * selectSuppressionData enum.
 */
enum SelectSuppressionData: string
{
    case Extend = 'extend';
    case Count = 'count';
}
