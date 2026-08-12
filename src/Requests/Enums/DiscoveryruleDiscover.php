<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Requests\Enums;

/**
 * Override the discover status for selected object. Possible values: 0 - Yes, continue discovering the objects; 1 - No, new objects will not be discovered and existing ones will be marked as lost. Property behavior: required.
 */
enum DiscoveryruleDiscover: int
{
    case Yes = 0;
    case No = 1;
}
