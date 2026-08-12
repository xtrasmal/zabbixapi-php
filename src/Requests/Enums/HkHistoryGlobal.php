<?php declare(strict_types=1);

namespace Idiot\Zabbix\Requests\Enums;

/**
 * Override item history period. Possible values: 0 - Do not override; 1 - (default) Override.
 */
enum HkHistoryGlobal: int
{
    case DoNotOverride = 0;
    case Override = 1;
}
