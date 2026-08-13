<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Api\Requests\Enums;

/**
 * HTTP authentication. Possible values: 0 - (default) Disabled; 1 - Enabled. Supported if $ALLOW_HTTP_AUTH is enabled in the frontend configuration file (zabbix.conf.php).
 */
enum HttpAuthEnabled: int
{
    case Disabled = 0;
    case Enabled = 1;
}
