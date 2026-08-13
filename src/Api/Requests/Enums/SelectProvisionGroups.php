<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Api\Requests\Enums;

/**
 * selectProvisionGroups enum.
 */
enum SelectProvisionGroups: string
{
    case Extend = 'extend';
    case Count = 'count';
}
