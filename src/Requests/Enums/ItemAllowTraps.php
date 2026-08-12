<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Requests\Enums;

/**
 * Allow to populate value similarly to the trapper item.  0 - (default) Do not allow to accept incoming data; 1 - Allow to accept incoming data.  Property behavior: - supported if type is set to "HTTP agent" - read-only for discovered objects
 */
enum ItemAllowTraps: int
{
    case DoNotAllowToAccept = 0;
    case AllowToAcceptIncomingData = 1;
}
