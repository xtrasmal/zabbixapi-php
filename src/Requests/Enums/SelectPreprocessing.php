<?php declare(strict_types=1);

namespace Idiot\Zabbix\Requests\Enums;

/**
 * selectPreprocessing enum.
 */
enum SelectPreprocessing: string
{
    case Extend = 'extend';
    case Count = 'count';
}
