<?php declare(strict_types=1);

namespace IntelliTrend\Zabbix\Requests\Enums;

/**
 * selectPreprocessing enum.
 */
enum SelectPreprocessing: string
{
    case Extend = 'extend';
    case Count = 'count';
}
