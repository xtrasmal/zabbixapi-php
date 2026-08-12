<?php declare(strict_types=1);

namespace Idiot\Zabbix\Requests\Enums;

/**
 * Override item trend period. Possible values: 0 - Do not override; 1 - (default) Override.
 */
enum HkTrendsGlobal: int
{
    case DoNotOverride = 0;
    case Override = 1;
}
