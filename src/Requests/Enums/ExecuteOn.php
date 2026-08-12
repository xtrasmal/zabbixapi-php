<?php declare(strict_types=1);

namespace Idiot\Zabbix\Requests\Enums;

/**
 * Where to run the script. Supported if type is set to "Script". Possible values: 0 - run on Zabbix agent; 1 - run on Zabbix server (supported only if execution of global scripts is enabled on Zabbix server); 2 - (default) run on Zabbix server or proxy.
 */
enum ExecuteOn: int
{
    case RunOnZabbixAgent = 0;
    case RunOnZabbixServerSupported = 1;
    case RunOnZabbixServerOr = 2;
}
