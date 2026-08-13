<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Api\Requests\Enums;

/**
 * selectProvisionMedia enum.
 */
enum SelectProvisionMedia: string
{
    case Extend = 'extend';
    case Count = 'count';
}
