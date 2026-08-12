<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Requests\Enums;

/**
 * Whether the report is enabled or disabled. Possible values: 0 - Disabled; 1 - (default) Enabled.
 */
enum ReportStatus: int
{
    case Disabled = 0;
    case Enabled = 1;
}
