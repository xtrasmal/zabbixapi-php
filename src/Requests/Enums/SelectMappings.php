<?php declare(strict_types=1);

namespace Idiot\Zabbix\Requests\Enums;

/**
 * selectMappings enum.
 */
enum SelectMappings: string
{
    case Extend = 'extend';
    case Count = 'count';
}
