<?php declare(strict_types=1);

namespace IntelliTrend\Zabbix\Requests\Enums;

/**
 * Trigger prototype discovery status. Possible values: 0 - (default) new triggers will be discovered; 1 - new triggers will not be discovered and existing triggers will be marked as lost.
 */
enum TriggerprototypeDiscover: int
{
    case NewTriggersWillBeDiscovered = 0;
    case NewTriggersWillNotBe = 1;
}
