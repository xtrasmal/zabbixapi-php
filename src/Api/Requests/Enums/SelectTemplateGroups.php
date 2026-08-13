<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Api\Requests\Enums;

/**
 * selectTemplateGroups enum.
 */
enum SelectTemplateGroups: string
{
    case Extend = 'extend';
    case Count = 'count';
}
