<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Api\Requests\Enums;

/**
 * selectParentTemplates enum.
 */
enum SelectParentTemplates: string
{
    case Extend = 'extend';
    case Count = 'count';
}
