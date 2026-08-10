<?php declare(strict_types=1);

namespace IntelliTrend\Zabbix\Requests\Enums;

/**
 * selectLastEvent enum.
 */
enum SelectLastEvent: string
{
    case Extend = 'extend';
    case Count = 'count';
}
