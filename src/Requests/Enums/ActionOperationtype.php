<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Requests\Enums;

/**
 * Type of operation. Possible values: 0 - send message; 1 - global script; 11 - notify all involved.
 */
enum ActionOperationtype: int
{
    case SendMessage = 0;
    case GlobalScript = 1;
    case NotifyAllInvolved = 11;
}
