<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Api\Requests\Enums;

/**
 * selectInterfaces enum.
 */
enum SelectInterfaces: string
{
    case Extend = 'extend';
    case Count = 'count';
}
