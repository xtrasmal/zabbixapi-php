<?php declare(strict_types=1);

namespace Idiot\Zabbix\Requests\Enums;

/**
 * Whether the trigger can generate multiple problem events.  Possible values: 0 - (default) do not generate multiple events; 1 - generate multiple events.
 */
enum TriggerType: int
{
    case DoNotGenerateMultipleEvents = 0;
    case GenerateMultipleEvents = 1;
}
