<?php declare(strict_types=1);

namespace IntelliTrend\Zabbix\Requests\Enums;

/**
 * selectRelatedObject enum.
 */
enum SelectRelatedObject: string
{
    case Extend = 'extend';
    case Count = 'count';
}
