<?php declare(strict_types=1);

namespace IntelliTrend\Zabbix\Requests\Enums;

/**
 * Script type. Possible values if scope is set to "action operation": 0 - Script; 1 - IPMI; 2 - SSH; 3 - TELNET; 5 - Webhook. Possible values if scope is set to "manual host action" or "manual event action": 6 - URL.
 */
enum ScriptType: int
{
    case Script = 0;
    case Ipmi = 1;
    case Ssh = 2;
    case Telnet = 3;
    case Webhook = 5;
    case Url = 6;
}
