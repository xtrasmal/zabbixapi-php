<?php declare(strict_types=1);

namespace Idiot\Zabbix\Requests\Enums;

/**
 * selectTemplateGroups enum.
 */
enum SelectTemplateGroups: string
{
    case Extend = 'extend';
    case Count = 'count';
}
