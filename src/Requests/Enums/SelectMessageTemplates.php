<?php declare(strict_types=1);

namespace IntelliTrend\Zabbix\Requests\Enums;

/**
 * selectMessageTemplates enum.
 */
enum SelectMessageTemplates: string
{
    case Extend = 'extend';
    case Count = 'count';
}
