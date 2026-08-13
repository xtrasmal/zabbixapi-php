<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Api\Requests\Enums;

/**
 * selectStatusRules enum.
 */
enum SelectStatusRules: string
{
    case Extend = 'extend';
    case Count = 'count';
}
