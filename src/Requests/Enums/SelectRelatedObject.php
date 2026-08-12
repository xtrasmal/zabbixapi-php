<?php declare(strict_types=1);

namespace Idiot\Zabbix\Requests\Enums;

/**
 * selectRelatedObject enum.
 */
enum SelectRelatedObject: string
{
    case Extend = 'extend';
    case Count = 'count';
}
