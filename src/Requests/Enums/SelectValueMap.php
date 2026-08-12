<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Requests\Enums;

/**
 * selectValueMap enum.
 */
enum SelectValueMap: string
{
    case Extend = 'extend';
    case Count = 'count';
}
