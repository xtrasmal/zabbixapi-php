<?php declare(strict_types=1);

namespace IntelliTrend\Zabbix\Requests\Enums;

/**
 * selectParentTemplates enum.
 */
enum SelectParentTemplates: string
{
    case Extend = 'extend';
    case Count = 'count';
}
