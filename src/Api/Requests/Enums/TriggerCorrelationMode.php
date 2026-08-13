<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Api\Requests\Enums;

/**
 * OK event closes.  Possible values: 0 - (default) All problems; 1 - All problems if tag values match.
 */
enum TriggerCorrelationMode: int
{
    case AllProblems = 0;
    case AllProblemsIfTagValues = 1;
}
