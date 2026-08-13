<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Api\Requests\Enums;

/**
 * selectLLDMacroPaths enum.
 */
enum SelectLLDMacroPaths: string
{
    case Extend = 'extend';
    case Count = 'count';
}
