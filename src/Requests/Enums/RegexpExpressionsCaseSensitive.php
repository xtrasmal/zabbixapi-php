<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Requests\Enums;

/**
 * Case sensitivity. Possible values: 0 - Case insensitive; 1 - Case sensitive. Default: 0.
 */
enum RegexpExpressionsCaseSensitive: int
{
    case CaseInsensitive = 0;
    case CaseSensitive = 1;
}
