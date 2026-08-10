<?php declare(strict_types=1);

namespace IntelliTrend\Zabbix\Requests\Enums;

/**
 * selectTemplateGroupRights enum.
 */
enum SelectTemplateGroupRights: string
{
    case Extend = 'extend';
    case Count = 'count';
}
