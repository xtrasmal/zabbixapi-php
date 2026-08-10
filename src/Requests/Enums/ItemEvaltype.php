<?php declare(strict_types=1);

namespace IntelliTrend\Zabbix\Requests\Enums;

/**
 * Tag evaluation method.  Possible values: 0 - (default) And/Or; 2 - Or.
 */
enum ItemEvaltype: int
{
    case AndOr = 0;
    case Or = 2;
}
