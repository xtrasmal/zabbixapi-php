<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Requests\Enums;

/**
 * selectInheritedTags enum.
 */
enum SelectInheritedTags: string
{
    case Extend = 'extend';
    case Count = 'count';
}
