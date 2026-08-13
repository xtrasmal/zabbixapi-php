<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Api\Requests\Enums;

/**
 * selectShapes enum.
 */
enum SelectShapes: string
{
    case Extend = 'extend';
    case Count = 'count';
}
