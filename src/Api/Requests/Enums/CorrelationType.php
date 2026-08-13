<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Api\Requests\Enums;

/**
 * Type of operation. Possible values: 0 - close old events; 1 - close new event. Required.
 */
enum CorrelationType: int
{
    case CloseOldEvents = 0;
    case CloseNewEvent = 1;
}
