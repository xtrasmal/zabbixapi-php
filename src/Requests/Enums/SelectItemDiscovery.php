<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Requests\Enums;

/**
 * selectItemDiscovery enum.
 */
enum SelectItemDiscovery: string
{
    case Extend = 'extend';
    case Count = 'count';
}
