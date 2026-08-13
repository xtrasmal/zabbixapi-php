<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Api\Requests\Enums;

/**
 * selectMessageTemplates enum.
 */
enum SelectMessageTemplates: string
{
    case Extend = 'extend';
    case Count = 'count';
}
