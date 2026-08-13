<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Api\Requests\Enums;

/**
 * Enable internal housekeeping for services. Possible values: 0 - Disable; 1 - (default) Enable.
 */
enum HkServicesMode: int
{
    case Disable = 0;
    case Enable = 1;
}
