<?php declare(strict_types=1);

namespace Idiot\Zabbix\Requests\Enums;

/**
 * Whether to use this check as a device uniqueness criteria. Only a single unique check can be configured for a discovery rule. Possible values: 0 - (default) do not use this check as a uniqueness criteria; 1 - use this check as a uniqueness criteria. Property behavior: supported if type is set to "Zabbix agent", "SNMPv1 agent", "SNMPv2 agent", or "SNMPv3 agent".
 */
enum DruleDchecksUniq: int
{
    case DoNotUseThisCheck = 0;
    case UseThisCheckAsA = 1;
}
