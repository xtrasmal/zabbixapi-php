<?php declare(strict_types=1);

namespace IntelliTrend\Zabbix\Requests\Enums;

/**
 * Default authentication method. Possible values: 0 - (default) Internal; 1 - LDAP.
 */
enum AuthenticationType: int
{
    case Internal = 0;
    case Ldap = 1;
}
