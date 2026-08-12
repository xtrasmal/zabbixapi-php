<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Requests\Enums;

/**
 * Script scope. Possible values: 1 - action operation; 2 - manual host action; 4 - manual event action.
 */
enum ScriptScope: int
{
    case ActionOperation = 1;
    case ManualHostAction = 2;
    case ManualEventAction = 4;
}
