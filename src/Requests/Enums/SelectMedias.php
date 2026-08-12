<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Requests\Enums;

/**
 * selectMedias enum.
 */
enum SelectMedias: string
{
    case Extend = 'extend';
    case Count = 'count';
}
