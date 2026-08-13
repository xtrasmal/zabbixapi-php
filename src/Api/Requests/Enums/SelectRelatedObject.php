<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Api\Requests\Enums;

/**
 * selectRelatedObject enum.
 */
enum SelectRelatedObject: string
{
    case Extend = 'extend';
    case Count = 'count';
}
