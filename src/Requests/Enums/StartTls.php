<?php declare(strict_types=1);

namespace Idiot\Zabbix\Requests\Enums;

/**
 * LDAP server configuration option that allows the communication with the LDAP server to be secured using Transport Layer Security (TLS). Note that start_tls must be set to "Disabled" for hosts using the ldaps:// protocol. Possible values: 0 - (default) Disabled; 1 - Enabled. Supported if idp_type is set to "User directory of type LDAP".
 */
enum StartTls: int
{
    case Disabled = 0;
    case Enabled = 1;
}
