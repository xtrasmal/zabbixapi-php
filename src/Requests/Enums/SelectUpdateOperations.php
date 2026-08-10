<?php declare(strict_types=1);

namespace IntelliTrend\Zabbix\Requests\Enums;

/**
 * selectUpdateOperations enum.
 */
enum SelectUpdateOperations: string
{
    case Extend = 'extend';
    case Count = 'count';
}
