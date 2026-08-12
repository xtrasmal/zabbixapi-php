<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Requests\Enums;

/**
 * Whether to enable audit logging. Possible values: 0 - Disable; 1 - (default) Enable.
 */
enum AuditlogEnabled: int
{
    case Disable = 0;
    case Enable = 1;
}
