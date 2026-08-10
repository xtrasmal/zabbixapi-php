<?php declare(strict_types=1);

namespace IntelliTrend\Zabbix\Requests\Enums;

/**
 * Scenario to delete lost LLD resources. Possible values: 0 - (default) Delete after lifetime threshold is reached; 1 - Do not delete; 2 - Delete immediately.
 */
enum LifetimeType: int
{
    case DeleteAfterLifetimeThresholdIs = 0;
    case DoNotDelete = 1;
    case DeleteImmediately = 2;
}
