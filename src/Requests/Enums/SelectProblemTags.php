<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Requests\Enums;

/**
 * selectProblemTags enum.
 */
enum SelectProblemTags: string
{
    case Extend = 'extend';
    case Count = 'count';
}
