<?php declare(strict_types=1);

namespace IntelliTrend\Zabbix\Requests\Enums;

/**
 * Frontend authentication method of the users in the group. Possible values: 0 - (default) use the system default authentication method; 1 - use internal authentication; 2 - use LDAP authentication; 3 - disable access to the frontend.
 */
enum GuiAccess: int
{
    case UseTheSystemDefaultAuthentication = 0;
    case UseInternalAuthentication = 1;
    case UseLdapAuthentication = 2;
    case DisableAccessToTheFrontend = 3;
}
