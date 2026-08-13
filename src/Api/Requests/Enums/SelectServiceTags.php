<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Api\Requests\Enums;

/**
 * selectServiceTags enum.
 */
enum SelectServiceTags: string
{
    case Extend = 'extend';
    case Count = 'count';
}
