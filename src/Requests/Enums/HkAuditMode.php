<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Requests\Enums;

/**
 * Enable internal housekeeping for audit. Possible values: 0 - Disable; 1 - (default) Enable.
 */
enum HkAuditMode: int
{
    case Disable = 0;
    case Enable = 1;
}
