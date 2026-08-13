<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Api\Requests\Enums;

/**
 * selectDRules enum.
 */
enum SelectDRules: string
{
    case Extend = 'extend';
    case Count = 'count';
}
