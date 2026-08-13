<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Api\Requests\Enums;

/**
 * Whether to pause escalation during maintenance periods or not. Possible values: 0 - don't pause escalation; 1 - (default) pause escalation. Property behavior: supported if eventsource is set to "event created by a trigger".
 */
enum PauseSuppressed: int
{
    case DonTPauseEscalation = 0;
    case PauseEscalation = 1;
}
