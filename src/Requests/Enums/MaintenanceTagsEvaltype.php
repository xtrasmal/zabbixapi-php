<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Requests\Enums;

/**
 * Problem tag evaluation method. Possible values: 0 - (default) And/Or; 2 - Or.
 */
enum MaintenanceTagsEvaltype: int
{
    case AndOr = 0;
    case Or = 2;
}
