<?php declare(strict_types=1);

namespace IntelliTrend\Zabbix\Requests\Enums;

/**
 * Whether MFA is enabled or disabled for the users in the group. Possible values: 0 - disabled (for all configured MFA methods); 1 - enabled (for all configured MFA methods).
 */
enum UsergroupMfaStatus: int
{
    case DisabledForAllConfiguredMfa = 0;
    case EnabledForAllConfiguredMfa = 1;
}
