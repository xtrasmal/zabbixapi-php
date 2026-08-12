<?php declare(strict_types=1);

namespace Idiot\Zabbix\Requests\Enums;

/**
 * Allow situation where the target being ICMP pinged responds from a different IP address. Possible values: 0 - (default) treat redirected responses as if the target host is down (fail); 1 - treat redirected responses as if the target host is up (success). Property behavior: supported if type is set to "ICMP ping".
 */
enum DruleDchecksAllowRedirect: int
{
    case TreatRedirectedResponsesAsIf = 0;
    case TreatRedirectedResponsesAsIf2 = 1;
}
