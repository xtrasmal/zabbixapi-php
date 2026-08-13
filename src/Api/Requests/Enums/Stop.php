<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Api\Requests\Enums;

/**
 * Stop processing next overrides if matches. Possible values: 0 - (default) don't stop processing overrides; 1 - stop processing overrides if filter matches.
 */
enum Stop: int
{
    case DonTStopProcessingOverrides = 0;
    case StopProcessingOverridesIfFilter = 1;
}
