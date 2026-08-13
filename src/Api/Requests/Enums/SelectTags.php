<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Api\Requests\Enums;

/**
 * selectTags enum.
 */
enum SelectTags: string
{
    case Extend = 'extend';
    case Count = 'count';
}
