<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Requests\Enums;

/**
 * Whether to notify when escalation is canceled. Possible values: 0 - don't notify when escalation is canceled; 1 - (default) notify when escalation is canceled. Property behavior: supported if eventsource is set to "event created by a trigger".
 */
enum NotifyIfCanceled: int
{
    case DonTNotifyWhenEscalation = 0;
    case NotifyWhenEscalationIsCanceled = 1;
}
