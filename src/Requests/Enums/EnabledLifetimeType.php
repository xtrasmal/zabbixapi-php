<?php declare(strict_types=1);

namespace Idiot\Zabbix\Requests\Enums;

/**
 * Scenario to disable lost LLD resources. Possible values: 0 - Disable after lifetime threshold is reached; 1 - Do not disable; 2 - (default) Disable immediately.
 */
enum EnabledLifetimeType: int
{
    case DisableAfterLifetimeThresholdIs = 0;
    case DoNotDisable = 1;
    case DisableImmediately = 2;
}
