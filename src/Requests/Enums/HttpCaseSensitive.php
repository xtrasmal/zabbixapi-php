<?php declare(strict_types=1);

namespace IntelliTrend\Zabbix\Requests\Enums;

/**
 * HTTP case-sensitive login. Possible values: 0 - Off; 1 - (default) On. Supported if $ALLOW_HTTP_AUTH is enabled in the frontend configuration file (zabbix.conf.php).
 */
enum HttpCaseSensitive: int
{
    case Off = 0;
    case On = 1;
}
