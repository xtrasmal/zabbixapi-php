<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Api\Requests\Enums;

/**
 * Multi-factor authentication. Possible values: 0 - Disabled (for all configured MFA methods); 1 - Enabled (for all configured MFA methods).
 */
enum AuthenticationMfaStatus: int
{
    case DisabledForAllConfiguredMfa = 0;
    case EnabledForAllConfiguredMfa = 1;
}
