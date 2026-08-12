<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Requests\Enums;

/**
 * Host permissions needed to run the script. Supported if scope is set to "manual host action" or "manual event action". Possible values: 2 - (default) read; 3 - write.
 */
enum HostAccess: int
{
    case Read = 2;
    case Write = 3;
}
