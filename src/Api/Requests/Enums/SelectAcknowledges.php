<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Api\Requests\Enums;

/**
 * selectAcknowledges enum.
 */
enum SelectAcknowledges: string
{
    case Extend = 'extend';
    case Count = 'count';
}
