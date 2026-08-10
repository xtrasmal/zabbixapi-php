<?php declare(strict_types=1);

namespace IntelliTrend\Zabbix\Requests\Enums;

/**
 * selectProvisionGroups enum.
 */
enum SelectProvisionGroups: string
{
    case Extend = 'extend';
    case Count = 'count';
}
