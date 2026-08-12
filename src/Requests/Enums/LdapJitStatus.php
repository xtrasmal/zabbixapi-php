<?php declare(strict_types=1);

namespace Idiot\Zabbix\Requests\Enums;

/**
 * Status of LDAP provisioning. Possible values: 0 - Disabled for configured LDAP IdPs; 1 - Enabled for configured LDAP IdPs.
 */
enum LdapJitStatus: int
{
    case DisabledForConfiguredLdapIdps = 0;
    case EnabledForConfiguredLdapIdps = 1;
}
