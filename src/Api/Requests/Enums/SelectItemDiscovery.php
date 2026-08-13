<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Api\Requests\Enums;

/**
 * selectItemDiscovery enum.
 */
enum SelectItemDiscovery: string
{
    case Extend = 'extend';
    case Count = 'count';
}
