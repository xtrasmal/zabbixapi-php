<?php declare(strict_types=1);

namespace IntelliTrend\Zabbix\Requests\Enums;

/**
 * Provisioning status of the user directory. Possible values: 0 - (default) Disabled (provisioning of users created by this user directory is disabled); 1 - Enabled (provisioning of users created by this user directory is enabled; additionally, the status of LDAP or SAML provisioning (ldap_jit_status or saml_jit_status of Authentication object) must be enabled).
 */
enum ProvisionStatus: int
{
    case DisabledProvisioningOfUsersCreated = 0;
    case EnabledProvisioningOfUsersCreated = 1;
}
