<?php declare(strict_types=1);

namespace Idiot\Zabbix\Requests\Enums;

/**
 * Tag evaluation method. Possible values: 0 - (default) And/Or; 2 - Or.
 */
enum ProblemEvaltype: int
{
    case AndOr = 0;
    case Or = 2;
}
