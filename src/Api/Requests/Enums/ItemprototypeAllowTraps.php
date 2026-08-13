<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Api\Requests\Enums;

/**
 * Allow to populate value similarly to the trapper item. Possible values: 0 - (default) Do not allow to accept incoming data; 1 - Allow to accept incoming data. Property behavior: supported if type is set to "HTTP agent".
 */
enum ItemprototypeAllowTraps: int
{
    case DoNotAllowToAccept = 0;
    case AllowToAcceptIncomingData = 1;
}
