<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Requests\Enums;

/**
 * Whether to validate that the host name for the connection matches the one in the host's certificate. Possible values: 0 - (default) skip host verification; 1 - verify host.
 */
enum HttptestVerifyHost: int
{
    case SkipHostVerification = 0;
    case VerifyHost = 1;
}
