<?php declare(strict_types=1);

namespace Idiot\Zabbix\Requests\Enums;

/**
 * LDAP authentication. Possible values: 0 - (default) Disabled; 1 - Enabled.
 */
enum LdapAuthEnabled: int
{
    case Disabled = 0;
    case Enabled = 1;
}
