<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Api\Requests\Enums;

/**
 * selectPreprocessing enum.
 */
enum SelectPreprocessing: string
{
    case Extend = 'extend';
    case Count = 'count';
}
