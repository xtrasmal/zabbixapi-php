<?php declare(strict_types=1);

namespace Idiot\Zabbix\Requests\Enums;

/**
 * Whether the problem trigger will be displayed for elements with a single problem. Possible values: 0 - always display the number of problems; 1 - (default) display the problem trigger if there's only one problem.
 */
enum Expandproblem: int
{
    case AlwaysDisplayTheNumberOf = 0;
    case DisplayTheProblemTriggerIf = 1;
}
