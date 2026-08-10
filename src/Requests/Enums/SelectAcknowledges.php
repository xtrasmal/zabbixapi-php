<?php declare(strict_types=1);

namespace IntelliTrend\Zabbix\Requests\Enums;

/**
 * selectAcknowledges enum.
 */
enum SelectAcknowledges: string
{
    case Extend = 'extend';
    case Count = 'count';
}
