<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Requests\Enums;

/**
 * selectLLDMacroPaths enum.
 */
enum SelectLLDMacroPaths: string
{
    case Extend = 'extend';
    case Count = 'count';
}
