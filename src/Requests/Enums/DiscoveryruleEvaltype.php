<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Requests\Enums;

/**
 * Override filter condition evaluation method. Possible values: 0 - And/Or; 1 - And; 2 - Or; 3 - Custom expression. Property behavior: required.
 */
enum DiscoveryruleEvaltype: int
{
    case AndOr = 0;
    case And = 1;
    case Or = 2;
    case CustomExpression = 3;
}
