<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Api\Requests\Enums;

/**
 * selectTemplates enum.
 */
enum SelectTemplates: string
{
    case Extend = 'extend';
    case Count = 'count';
}
