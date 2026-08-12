<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Requests\Enums;

/**
 * Default login form. Possible values: 0 - (default) Zabbix login form; 1 - HTTP login form. Supported if $ALLOW_HTTP_AUTH is enabled in the frontend configuration file (zabbix.conf.php).
 */
enum HttpLoginForm: int
{
    case ZabbixLoginForm = 0;
    case HttpLoginForm = 1;
}
